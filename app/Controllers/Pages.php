<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title'   => 'About This System',
            'developer' => 'Hayden Bert Y. Yu',
            'section' => 'AC31',
            'Professor' => 'Ms. Canlas',
            'course' => 'IT0049 - Web System Technologies',
        ];

        return view('about', $data);
    }
}
