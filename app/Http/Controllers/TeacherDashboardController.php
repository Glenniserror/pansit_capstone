<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Activity;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // Kunin ang mga tunay na datos mula sa database
        // Halimbawa lamang ang mga ito:
        $stats = [
            'total_students' => 124,
            'avg_progress' => 67,
            'pending_reviews' => 18,
            'unread_messages' => 7
        ];

        // Kunin ang huling 4 na active students
        $recentActivities = [
            ['name' => 'Meland Carman', 'progress' => 78, 'status' => 'Excellent'],
            ['name' => 'Stephanie Tamayuza', 'progress' => 65, 'status' => 'Good'],
            ['name' => 'Kristine Villamor', 'progress' => 45, 'status' => 'Needs Help'],
            ['name' => 'Rhyssa Embanacido', 'progress' => 82, 'status' => 'Excellent'],
        ];

        return view('dashboard', compact('stats', 'recentActivities'));
    }
}