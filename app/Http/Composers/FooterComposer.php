<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $author = [
            'name' => 'jambik',
            'email' => 'jambik@gmail.com',
        ];
        $view->with('author', $author);
    }
}