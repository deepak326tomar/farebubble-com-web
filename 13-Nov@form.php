
<!-- <link rel="stylesheet" type="text/css" href="/Searchform/css/style.css"> -->
<!--<link rel="stylesheet" type="text/css" href="Searchform/css/bootstrap.min.css"> -->
<script src="/Searchform/js/jquery.min.js"></script>
<script src="/Searchform/js/bootstrap.min.js"></script>

<script>
                        function flight_form()
                        {
                            var loca=document.getElementById("location").value;
                            var res = loca.substring(0, 3);
                            document.getElementById("location").value=res;


                            var loca=document.getElementById("location2").value;
                            var res = loca.substring(0, 3);
                            document.getElementById("location2").value=res;
                            return true;
                        }
                    </script>
<script>
           function banner_change(val)
           {
               if(val==1)
               {
                  $('#banner_show').css("background-image", "url(./img/slider-images/1banners_img234.jpg)");  
                  $('#banner_content').html('Book Domestic and International Holidays');                  
               }
               else if(val==2)
               {
                   $('#banner_show').css("background-image", "url(./images/bail_banner.jpg)");  
                    $('#banner_content').html('Book on India Largest Hotel Network');       
               }
               else if(val==3)
               {
                 $('#banner_show').css("background-image", "url(./images/car_banners1.jpg)");   
                  $('#banner_content').html('Book Domestic and International Holidays');        
               }
               else
               {
                $('#banner_show').css("background-image", "url(./images/background_famil.jpg)");   
                  $('#banner_content').html('Book Domestic and International Holidays');   
               }
               
           }
          </script> 
<style>
	@media only screen and (min-width: 320px) and (max-width: 767px) {
		#ui-datepicker-div{
			width: 80% !important;
			min-margin-left: 10px;
		}
	}
	
</style>
<section class="bg_clrddd">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-lg-12" style="padding-right: 0px !important;padding-left: 0px !important;">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading col-12">
                        <ul class="pl-0">
                            <li class="active flight-btn-box">
                                <a href="#tab1default" data-toggle="tab" onClick="banner_change('1')" class="flight"> <img src="images/plane.png" alt="plane"> Flights </a>
                            </li>
							
							<!-- <li>
                                <a href="#tab1default2" data-toggle="tab" onClick="banner_change('1')"> <i class="fa fa-bed"></i> Hotels </a>
                            </li> -->
                           
                        </ul>
                    </div>

                    

                    <div class="panel-body">
                        <div class="tab-content">
                        <div class="tab-pane active" id="tab1default">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 frm_gap">
                                        <div class="form_bx">
                                        
                                            <form method="GET" action="https://farebubble.com:8091/Flights/loading.aspx" onsubmit="return  flight_form;()">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="flight_type col-12">
                                                            <div class="form-check-inline">

                                                              <div class="way-box">
                                                                  <label class="radio-inline checkbox">Round Trip
                                                                    <input type="radio" checked="checked" onClick="show_date(this.value)" value="roundtrip" name="tripType">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                              </div>

                                                               <div class="way-box">
                                                                  <label class="radio-inline checkbox">One Way
                                                                    <input type="radio" onClick="show_date(this.value)" value="oneway" name="tripType">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                               </div>
                                    <input type="hidden" name="metaID" value="1001">
                                    <input type="hidden" name="metaName" value="farebubble">
                                    <input type="hidden" name="website" value="farebubble">
                                    <input type="hidden" name="adID" value="">
                                     <!-- <input type="hidden" id="currency_id" name="currency" value="">   -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-fluid">
                                                  <div class="col-12">
                                                    <div class="row fm_ln1">
                                                    <div class="input-box ffrms_ppd">
                                                        <div class="form-group">
                                                            <label class="frm_llbs"><span>FROM</span>
                                                            <input type="text" required="required" class="ipt1 location-fld search-input" autocomplete="off" placeholder="City or airport" name="origin" id="location">
                                                            <div style="display: none;" onclick="close_btn(this.id);" id="location_cleardata" class="closed_icon"><i class="fa fa-remove"></i> </div>
                                                         </label>
                                                        </div>

                                                        <!-- <div class="two_site">
                                                            <i class="fa fa-exchange"></i>
                                                        </div> -->
                                                    </div>
                                                   
                                                    <div class="input-box ffrms_ppd">
                                                        <div class="form-group">
                                                            <label class="frm_llbs"><span>TO</span>
                                                            <input required="required" type="text" class="search-input ipt1 location-fld" placeholder="City or airport" name="destination" autocomplete="off" id="location2">
                                                            <div style="display: none;" onclick="close_btn(this.id);" id="location2_cleardata" class="closed_icon"> <i class="fa fa-remove"></i> </div>
                                                             </label>
                                                        </div>
                                                    </div>

                                                    <div class="input-box-1">
                                                        <div class="form-group">
                                                            <label class="frm_llbs"> <span>DEPARTURE</span>
                                                            <input name="departuredate" id="depDt" type="hidden" value=''>
                                                            <input type="text" class="ipt1 search-input" id="datepicker" required="required" autocomplete="off" placeholder="Depart Date" name="">
                                                            </label>
                                                        </div>
                                                    </div>

                                                

                                                    <div class="input-box-1">
                                                        <div class="form-group">
                                                            <label class="frm_llbs"> <span>RETURN</span>
                                                            <input name="returndate" id="retDt" type="hidden" value=''>
                                                            <input type="text" autocomplete="off" class="ipt1 search-input" required="required" id="datepicker2" placeholder="Return Date" >
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="input-box-2 ffrms_ppd">
                                                        <div class="form-group">
                                                            <label class="frm_llbs travellers"> <span>TRAVELLERS &amp; CLASS</span> 
                                                            <input type="text" class="ipt1 search-input" id="btm_clk" placeholder="Passenger" autocomplete="off" name="">
                                                            </label>
                                                          
<div class="psg_dls travellers-box" style="display: none;">



<div class="pass_bx row pb-2 pt-2 border-bottom">
<div class="col-6">
  <label class="trav-span">Adults <small>(+17 yrs)</small></label>
</div>
<div class="col-6">
  <div class="count-input space-bottom qty text-right">
<a class="incr-btn minus" onclick="decrease_adult_rt();" data-action="decrease" href="javascript:void(0);"></a>
<input class="quantity" type="text" id="AdultsRT" name="adults" value="1">
<a class="incr-btn plus" onclick="increase_adult_rt();" data-action="increase" href="javascript:void(0);"></a>
</div>
</div>
</div>





<div class="pass_bx row pb-2 pt-2 border-bottom">
<div class="col-6">
  <label class="trav-span">Child <small>(0-15 yrs)</small></label>
</div>
<div class="col-6">
  <div class="count-input space-bottom qty text-right">
<a class="incr-btn minus" onclick="decrease_child_rt();" data-action="decrease" href="javascript:void(0);"></a>
<input class="quantity" id="ChildrenRT" type="text" name="childs" value="0">
<a class="incr-btn plus" onclick="increase_child_rt();" data-action="increase" href="javascript:void(0);"></a>
</div>
</div>
</div>





<div class="pass_bx row pb-2 pt-2 border-bottom">
<div class="col-6">
  <label  class="trav-span"> Infant </label>
</div>
<div class="col-6">
  <div class="count-input space-bottom qty text-right">
<a class="incr-btn minus" onclick="decrease_infant_rt();" data-action="decrease" href="javascript:void(0);"></a>
<input class="quantity" id="InfantsRT" type="text" name="infants" value="0">
<a class="incr-btn plus" onclick="increase_infant_rt();" data-action="increase" href="javascript:void(0);"></a>
</div>
</div>
</div>



<input type="hidden" name="directFlights" value="">
<input type="hidden" name="nearbyAirport" value="">
<input type="hidden" name="flexiableDates" value="">


<div class="row gapres_dd pb-2 pt-2 border-bottom">
<div class="col-4">
  
<label class="trav-span"> Class</label>
</div>
<div class="col-8">
  <select class="class-select ipt1" name="classType" placeholder="Economy">
<option selected="selected" value="Y">Economy</option>
<option value="S"> Premium Economy </option>
<option value="C"> Business Class </option>
<option value="F"> First Class </option>
</select>
</div>
</div>





<div class="col-sm-6 col-xs-12">
<div class="row">
<div class="btn_dn">
<button type="button" onclick="all_pesenger();" class="btn_done apply">Done</button>
</div>
</div>
</div>

</div>
</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 text-center mt-4">
                                                        <button type="sumit" name="submitForm" class="search">Search Now</button>
                                                    </div>

                                                </div>
                                                  </div>
                                                </div>

                                                <div class="clearfix"></div>
                                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            <!-- TAB  tab3default SCETION -->
							
							<script type="text/javascript">
                                
                                function submit_hotel()
                                {
                                   var location=$('#locationhot').val();
                                   var arr=location.split('-');
                                   var split_arr=arr[1].split(',');
                                   var depdate=$('#depdth').val();
                                   var retdth=$('#retdth').val();
                                   var roomh=$('#roomh').val();
                                   var k='city-'+arr[0]+'~'+'country-'+split_arr[0]+'~'+'chkin-'+depdate+'~chkout-'+retdth;
                                   
                                   alert(k);
                                   alert(retdth);
                                   var url='http://orbisfliers.com:8089/home/deeplink?q=';
                                   return false;
                                  // http://orbisfliers.com:8089/home/deeplink?q=city-bangkok~country-Thailand~chkin-12-12-2018~chkout-14-12-2018~NoOfRoom-2~r1adt-2~r1chd-1~r1chdage-4~r2adt-2~r2chd-1~r1chdage-6 
                                }
                            </script>
							
							<div class="d-none tab-pane fade <?=($page_name=='hotel'?'in active':'');?>" id="tab1default2">

                                <form method="GET" action="https://hotel.farebubble.com/search-result.php">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="flight_type">
                                                <div class="form-check-inline">
                                                    <h3 class="head_hotal">  Unlock an extra 10% or more off select hotels. </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<input type="hidden" name="hot_desti" id="hot_desti" value=""/>
									 <input type="hidden" name="cntry_code" id="hot_cntry_code" value=""/>
                                    <div class="row fm_ln1">
                                        <div class="col-md-3 col-xs-12 ffrms_ppd">
                                            <div class="form-group">
                                                <label class="frm_llbs"> <img src="/Searchform/images/hotel_iim.png"> </label>
                                                <input type="text" required="required" class="form-control ipt1 location-hotel" autocomplete="off" placeholder=" Going to " name="org" id="locationhot">
                                                <div style="display: none;" onclick="close_btn(this.id);" id="locationhot_cleardata" class="closed_icon"><i class="fa fa-remove"></i> </div>

                                            </div>
                                        </div>

                                        <div class="col-md-2 col-xs-12 ffrms_ppd">
                                            <div class="form-group">
                                                <label class="frm_llbs"> <img src="/Searchform/images/dateoick.png"> </label>
                                                <input name="depDt" id="depdth" type="hidden" value=''>
                                                <input type="text" class="form-control ipt1" id="datepickerH" required="required" autocomplete="off" placeholder="Check-in" name="">
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-xs-12 ffrms_ppd">
                                            <div class="form-group">
                                                <label class="frm_llbs"> <img src="/Searchform/images/dateoick.png">  </label>
                                                <input name="retDt" id="retdth" type="hidden" value=''>
                                                <input type="text" autocomplete="off" class="form-control ipt1" required="required" id="datepickerH2" placeholder="Check-out">
                                            </div>
                                        </div>

                                     <input type="hidden" value="<?=date('Y-m-d_ms');?>" name="hotel_srch"/>

                                        <div class="col-md-3 col-xs-12 ffrms_ppd">
                                            <div class="form-group">
                                                <label class="frm_llbs"> <img src="/Searchform/images/ho_ad_ch.png">  </label>
                                                <input type="text" class="form-control ipt1" id="total_hotel_passenger" placeholder="Adults/Child/Room" name="">
            
                                        <div id="psg_dls_hotel" class="psg_dls" style="display: none;">
                             <input type="hidden" value="1" id="add_input" name="add_input">               
                              <div id="RoomADD">  
                                <div class="room_aads dynamic-field" id="dynamic-field-1">
                                <h4> <i class="fa fa-bed"></i>  Traveler Room  1 </h4> 
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Adults <small>(+18 yrs)</small></label>
                                                                <div class="input-group number-spinner">
                                                                    <span class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
                                                                    <input type="text" id="hadult_1" class="form-control text-center add_num" name="hadult_1" value="1">
                                                                    <span class="input-group-btn">
                                                                <a class="btn add_btn" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Children <small>(0-17 yrs)</small></label>
                                                                <div class="input-group">
                                                                    <span onclick="remove_child1();" class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
    <input type="text" id="ChildrenRT_1" class="form-control text-center add_num" name="ChildrenRT_1" value="0">

                                                        <span onclick="add_child1();" class="input-group-btn">
                                                                <a class="btn add_btn" data-dir=""><span  class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    

                                                <!--add child starthere -->
                                                <div class="row" id="add_child_1">
                                                <div class="col-md-6" id="first_child_1" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label>Child Age 1</label>
                                                    <select  name="room_child_1[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6" id="first_child_2" style="display: none;">
                                                        <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select name="room_child_1[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6" id="first_child_3" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_1[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>


                                                     <div class="col-md-6" id="first_child_4" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_1[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6" id="first_child_5" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_1[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>


                                                     </div> 
                                                <!--End child starthere -->



                                                  </div>
                                                  

                            <div style="display: none;" class="room_aads dynamic-field" id="dynamic-field-2">
                                <h4> <i class="fa fa-bed"></i>  Traveler Room 2 </h4> 
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Adults <small>(+18 yrs)</small></label>
                                                <div class="input-group number-spinner">
                                                                    <span class="input-group-btn">
                                                    <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
                                <input type="text" id="hadult_2" class="form-control text-center add_num" name="hadult_2" value="0">
                                <span class="input-group-btn">
                                                                <a class="btn add_btn" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Children <small>(0-17 yrs)</small></label>
                                                                <div class="input-group">
                                                                    <span onclick="remove_child2();" class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
<input type="text" id="ChildrenRT_2" class="form-control text-center add_num" name="ChildrenRT_2" value="0">

                                                        <span onclick="add_child2();" class="input-group-btn">
                                                                <a class="btn add_btn" data-dir=""><span  class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    


                                                     <div class="row" id="add_child_2">
                                                     
                                            <div class="col-md-6" id="second_child_1" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_2[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6" id="second_child_2" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_2[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                      <div class="col-md-6" id="second_child_3" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_2[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                      <div class="col-md-6" id="second_child_4" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_2[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                            <div class="col-md-6" id="second_child_5" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_2[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>


                                                     </div> 



                                                     <!-- End child 2 -->

                                                  </div>




                                                  <div style="display: none;" class="room_aads dynamic-field" id="dynamic-field-3">
                                <h4> <i class="fa fa-bed"></i>  Traveler Room  3 </h4> 
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Adults <small>(+18 yrs)</small></label>
                                                                <div class="input-group number-spinner">
                                                                    <span class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
                                                                    <input type="text" id="hadult_3" class="form-control text-center add_num" name="hadult_3" value="0">
                                                                    <span class="input-group-btn">
                                                                <a class="btn add_btn" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Children <small>(0-17 yrs)</small></label>
                                                                <div class="input-group ">
                                                                    <span onclick="remove_child3();" class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir=""><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
                    <input type="text" id="ChildrenRT_3" class="form-control text-center add_num" name="ChildrenRT_3" value="0">
                     <span onclick="add_child3();" class="input-group-btn">
                                                                <a class="btn add_btn" data-dir=""><span  class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    


                                                    <div class="row" id="add_child_3">
                                                     
                                            <div class="col-md-6" id="third_child_1" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_3[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6" id="third_child_2" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_3[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                      <div class="col-md-6" id="third_child_3" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_3[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                      <div class="col-md-6" id="third_child_4" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_3[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                            <div class="col-md-6" id="third_child_5" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_3[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>


                                                     </div> 

                                                     <!-- End third child -->

                                                  </div>



                                                  <div style="display: none;" class="room_aads dynamic-field" id="dynamic-field-4">
                                <h4> <i class="fa fa-bed"></i>  Traveler Room  4 </h4> 
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Adults <small>(+18 yrs)</small></label>
                                                                <div class="input-group number-spinner">
                                                                    <span class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
                                                                    <input type="text" id="hadult_4" class="form-control text-center add_num" name="hadult_4" value="0">
                                                                    <span class="input-group-btn">
                                                                <a class="btn add_btn" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="pass_bx">
                                                                <label>Children <small>(0-17 yrs)</small></label>
                                                                <div class="input-group ">
                                <span onclick="remove_child4();" class="input-group-btn">
                                                                <a class="btn mns_btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                                    </span>
                                                                    <input type="text" id="ChildrenRT_4" class="form-control text-center add_num" name="ChildrenRT_4" value="0">

                                                        <span onclick="add_child4();" class="input-group-btn">
                                                                <a class="btn add_btn" data-dir="up"><span  class="glyphicon glyphicon-plus"></span></a>
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    


                                                     <div class="row" id="add_child_4">
                                                     
                                            <div class="col-md-6" id="four_child_1" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_4[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6" id="four_child_2" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_4[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                      <div class="col-md-6" id="four_child_3" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_4[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                                      <div class="col-md-6" id="four_child_4" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_4[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>

                                            <div class="col-md-6" id="four_child_5" style="display: none;">
                                                         <div class="pass_bx">
                                                        <label> Child Age 1</label>
                                                    <select  name="room_child_4[]" class="form-control ipt1">
                                                        <option value="0">Under 1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                     </div>
                                                     </div>


                                                     </div>  

                                                  </div>


                                                  </div> 



                                        <script>
                                        function display1()
                                        {
                                        var a=document.getElementById("add_input").value;
                                        var t=+a +1;
                                        var d='dynamic-field-'+t;
                                        document.getElementById(d).style.display="block";
                                        document.getElementById("add_input").value=+a+1;
                                        }

                                        function display2()
                                        {
                                            var a=document.getElementById("add_input").value;
                                            var t=a;
                                            var d='dynamic-field-'+t;
                                            if(t!='1')
                                            {
                                            document.getElementById(d).style.display="none";
                                            document.getElementById("add_input").value=a-1;   
                                            }
                                        }

                       function all_pesengerH()
                       {
                        var total_adult=0;
                        var total_child=0;
                        var passenger=document.getElementById("add_input").value;
                        for (var i=0;i<passenger;i++)
                        {
                            var r=i+1;
                            var k='hadult_'+r;
                var adult=document.getElementById(k).value;
                total_adult=total_adult+ + adult;
                        }

                        for (var i=0;i<passenger;i++)
                        {
                            var t=i+1;
                            var k='ChildrenRT_'+t;
                var child=document.getElementById(k).value;
                total_child=total_child+ + child;
                        }
             document.getElementById("total_hotel_passenger").value=passenger +' Room ' + total_adult + ' Adult ' + total_child +' Child' ;
                       


                       }

                                        </script>      

                                                 
                                            <div class="row hhtrls">
                                              <div class="col-md-12">                                           
                                              <a  href="javascript:valid(0)" onclick="display1();" class="add-field" id="add-button" > <i class="fa fa-plus"></i> Room </a>
                                             <a href="javascript:valid(0)" onclick="display2();" class="add-field" id="remove-button" disabled="disabled" > <i class="fa fa-minus"></i> Room </a>                                                  
                                               </div>
                                             </div>   
                                             
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="btn_dn">
                                                                <button type="button" onclick="all_pesengerH();" class="btn_done btn_doneH">Done</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-md-2 col-xs-12">
                            <button type="sumit" name="submitFormHotel" value="submit_hotel_search">Search Now</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            
                           
                            

                             
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- <link rel="stylesheet" href="/Searchform/css/jquery-ui.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="/Searchform/js/jquery-ui.js"></script>

<script>
    jQuery(function($) {
        $("#datepicker").datepicker({
            minDate: 'D',
            dateFormat: "M-dd-yy-D",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),	
            onClose: function(selectedDate) {
                var s = selectedDate.split('-');
                var depdate = s[0]+ '-' + s[1] + '-' + s[2];
                $('#depDt').val(depdate);
                var d_dat = s[0]+ '-' + s[1] + '-' + s[2];
                $('#datepicker').val(d_dat);
                $('#datepicker_label').html(s[1] + '-' + s[3]);
                $("#datepicker2").datepicker("option", "minDate", selectedDate);
                $("#datepicker2").select();
                return false;
            }		
        });
    });

    jQuery(function($) {
        $("#datepicker2").datepicker({
            minDate: '+1D',
            dateFormat: "M-dd-yy-D",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onSelect: function(selectedDate) {
                var s = selectedDate.split('-');
                var depdate = s[0]+ '-' + s[1] + '-' + s[2];


                $('#retDt').val(depdate);
                var d_dat = s[0]+ '-' + s[1] + '-' + s[2];
                $('#datepicker2').val(d_dat);
                $('#datepicker2_label').html(s[1] + '-' + s[3]);
                return false;
            }
        });
    });
</script>

<script>

      jQuery(function($) {
        $("#datepickerH").datepicker({
            minDate: 'D',
            dateFormat: "dd-mm-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                $('#depdth').val(selectedDate);
                $('#datepickerH').val(selectedDate);
                $("#datepickerH2").datepicker("option", "minDate", selectedDate);
                $("#datepickerH2").select();
                return false;
            }
        });
    });



    jQuery(function($) {
        $("#datepickerH11").datepicker({
            minDate: 'D',
            dateFormat: "M-D-dd-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                alert(selectedDate);
                var s = selectedDate.split('-');
                var depdate = s[0] + '-' + s[2] + '-' + s[3];
                $('#depdth').val(depdate);
                var d_dat = s[0] + '-' + s[2];
                $('#datepickerH').val(d_dat);
                $('#datepicker_label').html(s[1] + '-' + s[3]);
                $("#datepickerH2").datepicker("option", "minDate", selectedDate);
                $("#datepickerH2").select();
                return false;
            }
        });
    });

    jQuery(function($) {
        $("#datepickerH2").datepicker({
            minDate: '+1D',
            dateFormat: "dd-mm-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                
                $('#retdth').val(selectedDate);
               
                $('#datepickerH2').val(selectedDate);
                return false;
            }
        });
    });
</script>

<script>
    jQuery(function($) {
        $("#datepicker_car").datepicker({
            minDate: 'D',
            dateFormat: "M-dd-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                $('#datepicker_car').val(selectedDate);
                $("#datepicker_car2").datepicker("option", "minDate", selectedDate);
                $("#datepicker_car2").select();
                return false;
            }
        });
    });

    jQuery(function($) {
        $("#datepicker_car2").datepicker({
            minDate: '+1D',
            dateFormat: "M-dd-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                $('#datepicker_car2').val(selectedDate);
                return false;
            }
        });
    });
</script>


<script>
    jQuery(function($) {
        $("#datepicker_HA").datepicker({
            minDate: 'D',
            dateFormat: "M-dd-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                $('#datepicker_HA').val(selectedDate);
                $("#datepicker_HA2").datepicker("option", "minDate", selectedDate);
                $("#datepicker_HA2").select();
                return false;
            }
        });
    });

    jQuery(function($) {
        $("#datepicker_HA2").datepicker({
            minDate: '+1D',
            dateFormat: "M-dd-yy",
            // defaultDate: "+1w",
            numberOfMonths: Resolution(),
            onClose: function(selectedDate) {
                $('#datepicker_HA2').val(selectedDate);
                return false;
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btm_clk").click(function() {
            $(".psg_dls").toggle(1000);
        });
        $(".btn_done").click(function() {

            var total = all_pesenger();
          //  alert(total);
            $("#btm_clk").val('Passengers ' + total);
            $(".psg_dls").hide(1000);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#total_hotel_passenger").click(function() {
            $("#psg_dls_hotel").toggle(1000);
        });
        $(".btn_doneH").click(function() {

            var total = all_pesenger();
            $("#btm_clkH").val('Adults/child ' + total);
            $(".psg_dls").hide(1000);
        });
    });
</script>


<script type="text/javascript">
    $(document).on('click', '.number-spinner a', function() {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });
</script>



<script>

	
function first_form()
	{
	var a=document.getElementById("location").value;	
	var b=document.getElementById("location2").value;	
	
	document.getElementById("location").value=a.substring(0,3);	
	document.getElementById("location2").value=b.substring(0,3);	
	document.getElementById("utm_campaign").value=a.substring(0,3)+'-'+b.substring(0,3);	
	
	
	}
</script>

<script type="text/javascript">
    function show_date(data) {

        if (data == 'oneway') {
            document.getElementById("datepicker2").disabled = true;
            var a = document.getElementById("datepicker2");
            a.removeAttribute("required");
        } else if (data == 'roundtrip') {
            document.getElementById("datepicker2").disabled = false;
            var b = document.getElementById("datepicker2");
            b.setAttribute("required", true);
        }

    }
</script>

<script>
       jQuery(function($) {   
//alert("hiiii");
   var arr = [];
$.getJSON('/airport.json', function(data) {
    $.each(data, function(key, value) {
		//alert(value);
		var codes = value.substring(0,3);
		//alert(codes);
        if ($.inArray(value, arr) === -1) {
            arr.push(value);
        }
    })
});
//console.log(arr);
$("#location").autocomplete({
    source: function( request, response ) {
		var stringLength = $.ui.autocomplete.escapeRegex( request.term ).length;
		//alert(stringLength);
               var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
			   var matcher2 = new RegExp( $.ui.autocomplete.escapeRegex( request.term )+"+", "i" );
			  
			   //alert(matcher);
			   var isData = 1;
             response( $.grep( arr, function( item ){
				 //alert(item);
				 //alert(matcher.test( item ));
				 
				 if(stringLength<=3)
				 {
					 if(matcher.test( item ))
					 {
					   isData = 22;
					 }
                       return matcher.test( item );
					  
				 }
				 else
				 {
					 if(matcher2.test( item ))
					 {
					 isData = 22;
					 }
					return matcher2.test( item ); 
				 }
				 
             }) );
			 //alert(isData);
			 if(stringLength==3 && isData == 1 )
				 {
			 response( $.grep( arr, function( item ){
				 //alert(item);
				 //alert(matcher.test( item ));
				 
				 
                       return matcher2.test( item );
					  
				 
				 
             }) );
			 }
    },
    minLength: 1,
});

$("#location2").autocomplete({
            source: function( request, response ) {
		var stringLength = $.ui.autocomplete.escapeRegex( request.term ).length;
		//alert(stringLength);
               var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
			   var matcher2 = new RegExp( $.ui.autocomplete.escapeRegex( request.term )+"+", "i" );
			   var isData = 1;
             response( $.grep( arr, function( item ){
				 //alert(item);
				 //alert(matcher.test( item ));
				 
				 if(stringLength<=3)
				 {
					 if(matcher.test( item ))
					 {
					   isData = 22;
					 }
                       return matcher.test( item );
					  
				 }
				 else
				 {
					 if(matcher2.test( item ))
					 {
					 isData = 22;
					 }
					return matcher2.test( item ); 
				 }
				 
             }) );
			 //alert(isData);
			 if(stringLength==3 && isData == 1 )
				 {
			 response( $.grep( arr, function( item ){
				 //alert(item);
				 //alert(matcher.test( item ));
				 
				 
                       return matcher2.test( item );
					  
				 
				 
             }) );
			 }
    },
    minLength: 1,
       });
	   });
</script>

<script>
    function close_btn(id) {
        var array = id.split("_");
        var content = array[0];
        document.getElementById(content).value = '';
        document.getElementById(id).style.display = 'none';
        var label_id = content + '_label';
        if (content == 'location') {
            $('#' + label_id).html('City Name');
            $("#location").attr("placeholder", "Airport");

        } else if (content == 'location2') {
            $('#' + label_id).html('City Name');
            $("#location2").attr("placeholder", "Airport");

        }

    }
</script>

<script>
    function add_rt_passenger() {
        var infow = $("#InfantsRT").val();
        var childow = $("#ChildrenRT").val();
        var adultow = $("#AdultsRT").val();
        var total = +infow + +childow + +adultow;
        return total;
    }

    function all_pesenger() {

        var infow = $("#InfantsRT").val();
        var childow = $("#ChildrenRT").val();
        var adultow = $("#AdultsRT").val();
        var total = +infow + +childow + +adultow;
        
        return total;
        // $("#btm_clk").val("Total Passengers  " + total);
    }

    function increase_adult_rt() {
        var adult_pass = add_rt_passenger();
        var adult_rt = document.getElementById("AdultsRT").value;
        if (adult_pass < 9) {
            var k = parseInt(adult_rt) + 1;
            document.getElementById("AdultsRT").value = k;
        }

    }

    function decrease_adult_rt() {
        var adult_rt = document.getElementById("AdultsRT").value;
        var InfantsRT = document.getElementById("InfantsRT").value;
        if (adult_rt != '1') {
            var k = parseInt(adult_rt) - 1;
            document.getElementById("AdultsRT").value = k;

            if (InfantsRT >= adult_rt) {
                var k = parseInt(InfantsRT) - 1;
                document.getElementById("InfantsRT").value = k;
            }

        }
    }

    function increase_child_rt() {
        var adult_pass = add_rt_passenger();
        var adult_rt = document.getElementById("ChildrenRT").value;
        if (adult_pass < 9) {

            var k = parseInt(adult_rt) + 1;
            document.getElementById("ChildrenRT").value = k;
        }

    }

    function decrease_child_rt() {
        var adult_rt = document.getElementById("ChildrenRT").value;
        if (adult_rt != '0') {
            var k = parseInt(adult_rt) - 1;
            document.getElementById("ChildrenRT").value = k;
        }
    }

    function increase_infant_rt() {

        var total_pass = add_rt_passenger();

        var adult_rt = document.getElementById("AdultsRT").value;
        var InfantsRT = document.getElementById("InfantsRT").value;

        if (total_pass < 9 && InfantsRT < adult_rt) {
            var k = parseInt(InfantsRT) + 1;
            document.getElementById("InfantsRT").value = k;
        }

    }

    function decrease_infant_rt() {
        var adult_rt = document.getElementById("InfantsRT").value;
        if (adult_rt != '0') {
            var k = parseInt(adult_rt) - 1;
            document.getElementById("InfantsRT").value = k;
        }
    }

    function Resolution() {
        if (window.innerWidth < 780) {
            return 1;
        } else {
            return 1;
        }
    }
</script>



<script>



                       
                function add_child1()
                {
                var b=document.getElementById("ChildrenRT_1").value;
                var r=+b + 1;
                if(r==6)
                {
                    document.getElementById("ChildrenRT_1").value=5;
                    return false;
                }
                else
                {
                    if(r<6)
                    {
                        document.getElementById("ChildrenRT_1").value=r;
                    }
                }
                document.getElementById("first_child_"+r).style.display="block";   
                }


                            function remove_child1()
                            {
                                // var b=document.getElementById("ChildrenRT_1").value;     
                                // if(b!=1)
                                // {
                                // document.getElementById("first_child_"+b).style.display="none";                
                                // }
                                // document.getElementById("ChildrenRT_1").value=b-1;

                                var b=document.getElementById("ChildrenRT_1").value;     
                                document.getElementById("first_child_"+b).style.display="none";                
                                
                                document.getElementById("ChildrenRT_1").value=b-1;

                            }



                             function add_child2()
                            {
                            var b=document.getElementById("ChildrenRT_2").value;
                            var r=+b + 1;
                            if(r==6)
                            {
                                document.getElementById("ChildrenRT_2").value=5;
                                return false;
                            }
                            else
                            {
                                if(r<6)
                                {
                                    document.getElementById("ChildrenRT_2").value=r;
                                }
                            }
                    document.getElementById("second_child_"+r).style.display="block";   
                            }


                            function remove_child2()
                            {
                                var b=document.getElementById("ChildrenRT_2").value;     
                              
                                document.getElementById("second_child_"+b).style.display="none";                
                                document.getElementById("ChildrenRT_2").value=b-1;
                            }



                             function add_child3()
                            {
                            var b=document.getElementById("ChildrenRT_3").value;
                            var r=+b + 1;
                            if(r==6)
                            {
                                document.getElementById("ChildrenRT_3").value=5;
                                return false;
                            }
                            else
                            {
                                if(r<6)
                                {
                                    document.getElementById("ChildrenRT_3").value=r;
                                }
                            }
                    document.getElementById("third_child_"+r).style.display="block";   
                            }


                            function remove_child3()
                            {
                                var b=document.getElementById("ChildrenRT_3").value;     
                               
                                document.getElementById("third_child_"+b).style.display="none";                
                               
                                document.getElementById("ChildrenRT_3").value=b-1;
                            }

    

                            function add_child4()
                            {
                            var b=document.getElementById("ChildrenRT_4").value;
                            var r=+b + 1;
                            if(r==6)
                            {
                                document.getElementById("ChildrenRT_4").value=5;
                                return false;
                            }
                            else
                            {
                                if(r<6)
                                {
                                    document.getElementById("ChildrenRT_4").value=r;
                                }
                            }
                    document.getElementById("four_child_"+r).style.display="block";   
                            }


                            function remove_child4()
                            {
                                var b=document.getElementById("ChildrenRT_4").value;     
                               
                                document.getElementById("four_child_"+b).style.display="none";                
                               
                                document.getElementById("ChildrenRT_4").value=b-1;
                            }
            


        $(document).ready(function() {
 
$(".search_auto_from").autocomplete({
                  source: function( request, response ){
               
                    $.ajax( {
                      url: "/get_from_city.php",
                      dataType: "json",
                      data: {
                        term: request.term
                      },
                      success: function( data ) {
                        response(data);
                      }
                    } );
                  },
                  minLength: 0,
                  open: function() {
                    $(".ui-autocomplete").css({"max-height": 250,"overflow":"scroll","overflow-x": "hidden","z-index":99999});
                  },
                  select: function( event, ui ) {
                    $("#locationhot").val(ui.item.id);
                  }
});

$('.search_auto_from').click(function() { $(this).autocomplete("search", ""); });
});               
</script>
