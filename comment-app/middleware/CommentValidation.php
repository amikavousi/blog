<?php

namespace CommentApp\middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentValidation
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($this->getData($request), $this->getRules());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->getMessages(), 'comment');
        }
        return $next($request);
    }

    private function getData(Request $request)
    {
        return $request->only([
            'post_id',
            'body'
        ]);
    }

    private function getRules()
    {
        return [
            'post_id' => 'required|numeric',
            'body' => 'required',
        ];
    }
}
