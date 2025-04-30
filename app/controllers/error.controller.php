<?php 
namespace App\Controllers;

function error_404(): void {
    render_view('error/404', []);
}