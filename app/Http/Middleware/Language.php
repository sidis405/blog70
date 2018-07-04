<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // verifichiamo che la locale esiste tra le nostre locali supportate
        // https://blog70.dev/en/posts/{id}
        // en - 1
        // posts - 2
        // id - 3
        $locale = $request->segment(1); //it en

        // se non esiste,
        if (! array_key_exists($locale, config('app.locales'))) {
            // reindirizziamo a un url con locale valida
            $segments = $request->segments(); //inizia da 0
            $segments[0] = config('app.fallback_locale'); // array

            return redirect(join('/', $segments));
        }
        // applicchiamo la locale
        // \App::setLocale($locale);
        app()->setLocale($locale);

        return $next($request);
    }
}
