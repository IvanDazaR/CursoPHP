<?php

// require 'app/Models/Job.php';
// require 'app/Models/Project.php';
// require_once 'app/Models/Printable.php';

// require 'lib1/Project.php';


use App\Models\{Job, Project};


// $projectLib = new Lib1\Project();

$jobs = Job::all();

$project1 = new Project('Project 1', 'Description 1');

$projects = [
    $project1
];
  
function printElement($job) {
    // if($job->visible == false) {
    //   return;
    // }
  
    echo '<li class="work-position">';
    echo '<h5>' . $job->title . '</h5>';
    echo '<p>' . $job->description . '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }