<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class SSEController extends Controller
{
//    public function stream(Request $request)
//    {
//        // Set the appropriate headers for SSE
//        header('Content-Type: text/event-stream');
//        header('Cache-Control: no-cache');
//        header('Connection: keep-alive');
//
//        // Define a function to send SSE data
//        function sendSSE($data) {
//            echo "data: $data\n\n";
//            ob_flush();
//            flush();
//        }
//
//        // Loop to continuously send SSE data
//        while (true) {
//            // Check if the client is still connected
//            if (connection_aborted()) {
//                break;
//            }
//
//            // Fetch data from the database
//            $totalTrades = Etudiant::latest()->count();
//
//            // Send SSE data
//            sendSSE(json_encode(['total_trades' => $totalTrades]));
//
//            // Sleep for a short interval
//            usleep(60000000); // 500ms
//        }
//    }



//    private function needRefresh()
//    {
//        // Your logic to check if there's new data
//        // For example, check a database or cache
//        return true; // Placeholder, replace with your actual logic
//    }
}
