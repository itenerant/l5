<?php

namespace App\Helpers;

use Validator;

trait DataViewer {

    public function scopeSearchPaginateAndOrder($query)
    {
        $request = app()->make('request');

        $validator = Validator::make($request->only([
            'column', 'direction'
        ]), [
            'column' => 'required|alpha_dash|in:'.implode(',', self::$columns) ,
            'direction' => 'required|in:asc,desc'
        ]);


        if ($validator->fails()) {
            dd($validator->messages());
        }

        return $query
            ->orderBy($request->column, $request->direction)
            ->paginate(10);
    }

}