<?php

namespace App\Http\Controllers;
use App\Exports\EtudiantExport;
use App\Http\Requests\AjouterEtudiantRequest;
use App\Http\Requests\SearchEtudiantRequest;
use App\Http\Requests\EtudiantRequest;
use App\Http\Resources\EtudiantResource;
use App\Models\Element;
use App\Models\EmploiDuTemps;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Periode;
use App\Models\Professeur;
use App\Models\QRCodeScan;
use App\Models\Seance;
use App\Models\Semestre;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Str;



use Illuminate\Http\Request;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function exporterPdf()
    {
        toastr()->success('Etudiants exported successfully!');

        $etudiants = Etudiant::all();
        $pdf = Pdf::loadView('admin.etudiants.export_pdf', [ "etudiants" => $etudiants ])
            ->setPaper("a4","landscape");
        return $pdf->download('etudiants.pdf');
    }

    public function recordQRCodeScan(Request $request)
    {
        $validatedData = $request->validate([
            'session_id' => 'required|exists:seances,id',
            'student_id' => 'required|exists:etudiants,id',
        ]);

        // Create a new QR code scan record
        QRCodeScan::create([
            'session_id' => $validatedData['session_id'],
            'student_id' => $validatedData['student_id'],
            'scan_timestamp' => now(), // Assuming you have a 'scan_timestamp' column in your QRCodeScans table
        ]);

        return response()->json(['message' => 'QR code scan recorded successfully'], 200);
    }

    public function getNotScannedStudents(Request $request, $seance)
    {
        $session = Seance::findOrFail($seance); // Assuming $seance is the ID of the session
        $absentStudents = $session->expectedStudents()
            ->whereNotIn('etudiants.id', $session->scannedStudents()->pluck('etudiants.id'))
            ->get();

        return response()->json(["notScannedStudents"=>EtudiantResource::collection($absentStudents) ,
                                "expectedStudents"=>EtudiantResource::collection($session->emploiDuTemps->filiere->etudiants)
            ]) ;
    }

    public function dashboard()
    {
        $filieres = Filiere::withCount('etudiants')->get();
        $topFilieres = Filiere::select('filieres.*', 'total_absences')
            ->leftJoin(DB::raw('(SELECT etudiants.id_filiere, count(absences.id) as total_absences
                                      FROM etudiants
                                      INNER JOIN absences ON etudiants.id = absences.id_etudiant
                                      GROUP BY etudiants.id_filiere) as sub'), 'filieres.id', '=', 'sub.id_filiere')
            ->orderByDesc('total_absences')
            ->take(5)
            ->get();
        $studentsByGender = Etudiant::join('users', 'etudiants.user_id', '=', 'users.id')
            ->select('users.gender', DB::raw('count(*) as count'))
            ->groupBy('users.gender')
            ->get();
        return view("admin.dashboard",compact("filieres","topFilieres","studentsByGender"));
    }


    public function index()
    {
        $etudiants = Etudiant::paginate(10);
        $filieres = Filiere::all();


        return view("admin.etudiants.index" ,compact("etudiants","filieres")  );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AjouterEtudiantRequest $request)
    {
        // $password = substr($request->input('name'), 0, 1) . '.' . substr($request->input('cne'), -4);
        $password = substr($request->input('cne_a'), -4). '@' . substr($request->input('name_a'), 0);


        $user = User::create([
            'name' => $request->input('name_a'),
            'tele' => $request->input('tele_a'),
            'adresse' => $request->input('adresse_a'),
            'cin' => $request->input('cin_a'),
            'email' => $request->input('email_a'),
            'gender' => $request->input('gender_a'),
            'role' => 'etudiant',
            'image' => $request->input('gender_a')==="male" ?  asset("assets/img/avatars/man.png"):asset("assets/img/avatars/woman.png") ,
            'password' =>bcrypt($password),
        ]);

        $etudiant = Etudiant::create([
            'user_id' => $user->id,
            "id_filiere" => $request->input("id_filiere_a"),
            'cne' => $request->input('cne_a'),
            'apogee' => $request->input('apogee_a'),

        ]);


    // Send an email to the student with their email and password
   Mail::to($user->email)->send(new SendEmail($request->input('email_a'), $password));



        toastr()->success('Etudiant created successfully!');
        return to_route('etudiants.index');}


        public function search(SearchEtudiantRequest $request)
        {

            $results=Etudiant::query();
            if($request->filled("cin_cne")){

                $cin_cne = $request->input('cin_cne');

                 $results->where(function ($query) use ($cin_cne) {
                    $query->where('apogee', "$cin_cne")
                    ->orWhere('cne',  "$cin_cne");
                })->get();
                $etudiants = $results->get();
                $filieres = Filiere::all();

                return view('admin.etudiants.index', compact('etudiants', 'filieres'));

            }


            $etudiants = Etudiant::paginate(10);

            $filieres = Filiere::all();

            return view('admin.etudiants.index', compact('etudiants', 'filieres'));

        }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $user_id = $etudiant->user->user_id;

        return view('admin.etudiants.index', compact('etudiant','user_id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $validated = $request->validate([
            'name' => 'required',
            'tele' => 'required',
            'adresse' => 'required',
            'cin' => 'required',
            'email' => 'required|email',
            'cne' => 'required',
            'apogee' => 'required',
        ]);

        $user = $etudiant->user;
        // dd($user,$request);

        $user->name = $request->input("name");
        $user->cin = $request->input("cin");
        $etudiant->apogee = $request->input("apogee");
        $etudiant->cne = $request->input("cne");
        $etudiant->id_filiere = $request->input("id_filiere");
        $user->email = $request->input("email");
        $user->tele = $request->input("tele");
        $user->adresse = $request->input("adresse");


        $user->save();
        $etudiant->save();
        toastr()->success('Etudiant updated successfully!');

        return to_route('etudiants.index');
        // dd("kkkk");
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        {
            $user = User::find($etudiant->user->id);
            $user->delete();
            $etudiant->delete();
            toastr()->success('Etudiant deleted successfully!');

            return redirect()->route('etudiants.index');
        }
    }


    public function chercherEtdsParFiliere( Request $request )
    {
        $dateValue = $request->input('date'); // Assuming 'date' is the name of your input field
        $day = date('l', strtotime($dateValue));
        $periodes = Periode::all();
        $filieres = Filiere::all();
        $elements = Element::all();
        $s = Semestre::where("id_filiere", $request->input("id_filiere"))
            ->where("name", $request->input("name_semestre"))
            ->first();
        $e=EmploiDuTemps::where("id_filiere",$request->input("id_filiere"))->where("id_semestre",$s->id)->get()->first();
        $seance=Seance::where("id_periode",$request->input("id_periode"))
                        ->where("id_element",$request->input("id_element"))
                        ->where("id_emploi_du_temps",$e->id)
                        ->where("day",$day)
                        ->get()->first();
        if ( $seance ){
            $etudiants = Etudiant::where("id_filiere",$request->input("id_filiere"))->paginate(9);
            $data = $seance;
            $data["date_unique"] = Carbon::now()->format('y-m-d h:i:s');
            $qrCode = QrCode::size(350)->generate($data);
            toastr()->success('Seance found in the emplois');
            return view("professeur.renderQrCodeAndEtudiantTable",compact("seance","etudiants","qrCode"));
        }
        toastr()->error('Seance not found in the emplois!');
        return view("professeur.index",compact("periodes","filieres","elements"));
    }

    //            $sessionStartTime = now()->addMinutes(5);
//            $seance->update(['expired' => false]);
//            Cache::put('session_start_time_' . $seance->id, $sessionStartTime);

    public function exporter()
    {
        toastr()->success('Etudiants exported successfully!');
        return Excel::download(new EtudiantExport(), 'etudiants.xlsx');
    }



}
