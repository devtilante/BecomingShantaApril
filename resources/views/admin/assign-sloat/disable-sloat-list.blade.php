<x-header />
<x-menu />
<x-sidebar />
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Disabled Sloat</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

     

            {{-- Add Testimonial Modal --}}

                        <div class="modal-header text-bg-success border-0">
                            <h4 class="modal-title" id="primary-header-modalLabel">MANAGE DISABLED SLOAT</h4>

                        </div>
                        <form action="{{route('disable-sloat')}}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf @method('POST');

                            <input type="hidden" name="tour_menu_id" value="2">
                            <div class="modal-body">
                                 <div class="row">
                                       <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Consultant</label>
                                                <select name="consultant_id" class="form-control" required>
                                                    <option value="">Select Consultant</option>
                                                    @if($consultant_list)
                                                    @foreach($consultant_list as $consultant)
                                                    <?php
                                                     $sel="";
                                                      if($consultant->id==$consultant_id){
                                                          $sel="selected";
                                                      }
                                                     ?>
                                                    <option value="{{$consultant->id}}" <?php echo $sel;?>>{{$consultant->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                    
                                            </div>
                                        </div>  
                                        
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" required="" value="<?php if(!empty($date)){ echo date('Y-m-d',strtotime($date));}?>">
                                                
                                            </div>
                                        </div> 
                                        <div class="col-md-4" style="padding-top:30px;">
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </div>
                                        </form>
                                </div> 
                                <form method="POST" action="{{route('update-disable-sloat')}}">
                                    @csrf
                                    <input type="hidden" name="hid_consultant_id" value="{{$consultant_id}}">
                                    <input type="hidden" name="hid_date" value="{{$date}}">
                                @if($disable_sloat)
                                <div class="row">
                                    <table class="table" style="width:50%;">
                                        <tr>
                                            <th>Sloat</th> <th></th> <th></th>
                                        </tr>
                                        @if($sloat_master)
                                        @foreach($sloat_master as $key=> $sloat)
                                        <?php 
                                        
                                        $chck="";
                                        if (in_array($sloat->id, $disable_sloat)){
                                            
                                            $chck="checked";
                                        }
                                        
                                        
                                        
                                        ?>
                                        <tr>
                                            <th>{{$sloat->sloat_name}}</th> <th><input type="checkbox" <?php echo $chck;?> value="{{$sloat->id}}" name="sloat_id[]"></th>
                                            
                                        </tr>
                                        @endforeach
                                        @endif
                                        <tr>
                                            <td colspan="3" text-align="right"><button type="submit" class="btn btn-success">UPDATE</button></td>
                                        </tr>
                                        
                                    </table>
                                        
                                </div>
                                <div class="modal-footer">
                                
                            </div>
                                @endif

                            
                        </form>

            {{-- End Add Testimonial Modal --}}

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->



</div>
<x-footer />


