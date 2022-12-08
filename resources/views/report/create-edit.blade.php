@extends('admin.layouts.master')

@section('content')
    <div class="max-w-6xl mx-auto mt-8 sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="grid grid-cols-3">
                        <div class="col-span-1">
                            <h1 class="text-2xl leading-6 font-medium text-gray-900 text-left pb-3 pl-2">
                                New Report
                            </h1>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 border border-dark">
                                <div class="card-header py-3 card-header-color">
                                    <h6 class="m-0 font-weight-bold text-black">Create new Report</h6>
                                </div>
                                <div class="card-body bg-gray-300">
                                    <div class="card-body">
                                        <form>
                                            <div class="col-md-6 mb-4 mw-100">
                                                <label for="report_name " class="form-label font-weight-bold">Report
                                                    Name</label>
                                                <input type="text" id="report_name" class="form-control mw-100" />
                                            </div>

                                            <div class="col-md-6 mb-4 mw-100">
                                                <label class="form-label font-weight-bold"
                                                    for="description">Description</label>
                                                <textarea name="description" id="description" cols="50" rows="3" class="form-control mw-100"></textarea>
                                            </div>

                                            <div id="button">
                                                <input type="button" value="Register" class="btn px-3 btn-primary">
                                                <input type="submit" value="Reset" class="btn px-3 btn-warning">
                                                <input type="submit" value="Cancel" href="{{ url('') }}"
                                                    class="btn px-3 btn-danger">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
