<?php

namespace App\Http\Middleware;

use Closure;

class Example
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
   /*     $accion = $request->route()->getAction();
        if($accion['cosa'] && $accion['otro']){ //no halle otra forma :( bueno otra forma https://laracasts.com/discuss/channels/general-discussion/can-you-add-parameters-to-middleware
*/
             return $next($request);

       /*  }*/

        // return response('No puedes continuar', 404);
        /* return response()->view('errors.404');*/
    }
}
