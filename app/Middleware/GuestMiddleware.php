<?php 

namespace Kuliah\ManagementDocument\Middleware;

class GuestMiddleware implements Middleware
{

    function before(): void
    {
        if (isset($_SESSION['user'])) {
            header('Location: /dashboard');
            exit;
        }
    }

}