@include('layouts.header')
<section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="{{URL::to('/')}}" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Our Consultants</h1>
                    <form>
                       <select class="form-select" aria-label="Default select example">
                             <option selected><i class="fa-solid fa-check"></i> All Services</option>
                             <option value="1">Psychological Wellbeing</option>
                             <option value="2">Somatic Therapies</option>
                             <option value="3">Movement Therapies</option>
                             <option value="4">Soul & Spirit Care</option>
                        </select>
                    </form>

                </div>
             </div>
         </div>
     </section>

 <!-- start consultant -->
    <section class="Consultants p-50">
        <div class="container">
           <div class="row">
               @if($cunsultant_list)
                @foreach($cunsultant_list as $consultant)
               <div class="col-lg-3 col-md-4 col-6">
                  <div class="card">
                    <a href="{{route('consultant-profile')}}?id={{$consultant->id}}">
                     <div class="card-img">
                        <img src="{{asset('images/consultant')}}/{{$consultant->photo}}" class="card-img-top" alt="...">
                     </div>
                     <div class="card-body">
                      <h4 class="card-title">{{$consultant->name}}</h4>
                      <p class="card-text">{{$consultant->designation}}</p>
                      <p class="sm">Accepting new clients</p>
                      <span class="link-btn"><i class="fas fa-arrow-up"></i><span>
                      </a>
                    </div>
                  </div>
               </div>
               @endforeach
               @endif
                
               
           </div>
        </div>
    </section>

@include('layouts.footer')