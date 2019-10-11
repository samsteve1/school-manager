@extends('account.layouts.app')
@section('account.content_header')
   @yield('account_content_sub_header')
@endsection

@section('account.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                    @include('layouts.partials.flash._alert')

                <div class="box-header with-border">
                    <h3 class="box-title">@yield('account_content_box_title')</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">
                        <div class="row">


                            @yield('account_content_box_body')
                        <!-- /.row -->
                      </div>

                      <div class="box-footer">
                            <div class="row">
                                @yield('account_content_box_footer')
                            </div>
                            <!-- /.row -->
                          </div>
                 <!-- /.box-footer -->


            </div>

            </div>
    </div>
@endsection
