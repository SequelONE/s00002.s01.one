<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller {

    /**
     * Get all employee data
     * @throws \JsonException
     */
    public function index()
    {
        $employees = Employee::getAll();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \JsonException
     */
    public function store(Request $request)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/create';

        $headers = ['Content-Type: application/json'];

        $post_data = response()->json([
                'name' => $request->get('name'),
                'salary' => $request->get('salary'),
                'age' => $request->get('age')
            ]);

        $data_json = json_encode($post_data, JSON_THROW_ON_ERROR);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return redirect('/employees')->with('success', 'Employee saved. ' . $result);
    }

    /**
     * Display the specified resource. We don't need this one for this tutorial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::getEmployee($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Stock::find($id);
        return view('employee.edit', compact('employee'));  // -> resources/views/stocks/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'stock_name'=>'required',
            'ticket'=>'required',
            'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        ]);
        $stock = Stock::find($id);
        // Getting values from the blade template form
        $stock->stock_name =  $request->get('stock_name');
        $stock->ticket = $request->get('ticket');
        $stock->value = $request->get('value');
        $stock->save();

        return redirect('/employees')->with('success', 'Stock updated.'); // -> resources/views/stocks/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/employees')->with('success', 'Employee removed.');
    }

}