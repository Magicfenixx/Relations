<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReplaceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)

        {
            $response = $next($request);

            // Replace [[name]] placeholders with database values
            $content = $response->getContent();
            $replacements = DB::table('short_codes')->pluck('value', 'name')->toArray();
            $content = str_replace(array_keys($replacements), array_values($replacements), $content);
            $response->setContent($content);

            return $response;
            //        $response = $next($request);
//
//        $content = $response->getContent();
//
//        // Replace placeholders with values from the database
//        $content = preg_replace_callback('[[name]]', function ($matches) {
//            $placeholder = $matches[0];
//            $name = $matches[1];
//
//            $value = DB::table('values')->where('name', $name)->value('value');
//
//            return $value ?? $placeholder;
//        }, $content);
//
//        $response->setContent($content);
//
//        return $response;
    }
        }

