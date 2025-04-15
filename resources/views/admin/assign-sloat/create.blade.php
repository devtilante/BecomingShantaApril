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
                        <h4 class="page-title">Assign Slot</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            {{-- Add Testimonial Modal --}}

                        <div class="modal-header text-bg-success border-0">
                            <h4 class="modal-title" id="primary-header-modalLabel">ASSIGN SLOT</h4>

                        </div>
                        <form action="{{route('assignsloat.store')}}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf @method('POST');

                            <input type="hidden" name="tour_menu_id" value="2">
                            <div class="modal-body">
                                 <div class="row">
                                       <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Consultant</label>
                                                <select name="consultant_id" class="form-control" required>
                                                    <option value="">Select Consultant</option>
                                                    @if($consultant_list)
                                                    @foreach($consultant_list as $consultant)
                                                    <option value="{{$consultant->id}}">{{$consultant->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                    
                                            </div>
                                        </div>  
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Day</label>
                                                <select name="day" class="form-control" required="">
                                                <option value=""> Select Day</option>
                                                <option value="Monday" > Monday</option>
                                                <option value="Tuesday" > Tuesday</option>
                                                <option value="Wednesday" > Wednesday</option>
                                                <option value="Thursday" > Thursday</option>
                                                <option value="Friday" > Friday</option>
                                                <option value="Saturday" > Saturday</option>
                                                <option value="Sunday" > Sunday</option>
                                               </select>
                                            </div>
                                        </div> 
                                </div> 
                                
                                <div class="row">
                                    <table class="table" style="width:50%;">
                                        <tr>
                                            <th>Slot</th> <th>All <input type="checkbox" id="masterCheckbox"></th><th></th>
                                        </tr>
                                        @if($sloat_master)
                                        @foreach($sloat_master as $sloat)
                                        <tr>
                                            <th>{{$sloat->sloat_name}}</th> <th><input type="checkbox" value="{{$sloat->id}}" class="childCheckbox" name="sloat_id[]"></th>
                                            <th><div class="form-check">
  <input class="form-check-input" type="radio" name="is_online_{{$sloat->id}}" id="flexRadioDefault1_{{$sloat->id}}" value="1">
  <label class="form-check-label" for="flexRadioDefault1">
    Online
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="is_online_{{$sloat->id}}" id="flexRadioDefault2_{{$sloat->id}}" value="0" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Offline
  </label>
</div></th>
                                        </tr>
                                        @endforeach
                                        @endif
                                        
                                    </table>
                                        
                                </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>

            {{-- End Add Testimonial Modal --}}

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->



</div>
<x-footer />
<script>
    $(document).ready(function() {
    // When the master checkbox is clicked
    $('#masterCheckbox').on('change', function() {
        // Set all checkboxes to the same checked state as the master checkbox
        $('.childCheckbox').prop('checked', $(this).prop('checked'));
    });

    // If any individual checkbox is changed
    $('.childCheckbox').on('change', function() {
        // If all child checkboxes are checked, check the master checkbox
        // Otherwise, uncheck the master checkbox
        $('#masterCheckbox').prop('checked', $('.childCheckbox:checked').length === $('.childCheckbox').length);
    });
});
</script>


