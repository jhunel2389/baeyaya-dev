@extends('layouts.master')

@section('head')
@parent
<title>rates</title>
@stop
@section('addHead')
<style type="text/css">
  /*-------------Rates --------------------*/
  #rate form {
  float: center;
  color: #5a4535;
  height: 120;
  width: 1000px;
  border: 5px solid #5a4535;
  padding: 0px 10px 50px 10px;
  }
  #rate form table {
  border-collapse: collapse;

  }
  #rate form table td {
  padding-bottom: 6px;
  float:center;
  padding: 0px 10px 10px 10px;

  }
  #rate table td:first-child {
  font-size: 14px;
  line-height: 30px;
  width: 180px;
  text-transform: uppercase;
  }
  #rate table td.txtarea {
  vertical-align: top;
  }
  #rate form input {
  height: 17px;
  line-height: 17px;
  width: 278px;
  border: 1px solid #5a4535;
  border-radius: 2px;
  }
  #rate textarea {
  height: 143px;
  line-height: 17px;
  width: 338px;
  border: 1px solid #5a4535;
  border-radius: 2px;
  overflow: auto;
  resize: none;
  }
  #rate input.btn {
  background: url(../images/btn-send.png) no-repeat -70px 0;
  cursor: pointer;
  height: 26px;A
  width: 30px;
  border: 0;
  padding: 0;
  margin: 0;
  }
  #rate input.btn:hover {
  background-position: 0 0;
  }
  #rate p span {
  display: block;
  text-transform: uppercase;
  }
  .banner10{
  background: url(../images/rates.jpg) no-repeat;
  background-size: 100% 100%;
  min-height: 330px;
  position: relative;
}

  </style>
  @stop
  @section('content')
    <div class="contents">
      <br>
      <br>
      <div class="clearfix"> </div>
      <div class="clearfix"> </div>
      <br>
      <br>
      <br>
      <br>
      <div class="box" style="padding: 0px 0px 100px 80px;">
        <div id="rate" class="body" >
          <div id="field1-container" class="field f_100"  style="padding: 0px 0px 100px 80px;">
            <form action="BookingInfo.html" method="post">
               <div class="form_description">
                <br>
                <h3><font color="green">Swimming Rates: JAN-FEB/JUNE-DEC</font></h3>
                <td>
                  <font color="red" style="padding: 10px 120px 0px 200px;">Day Swimming(8:00am-5:00pm)</font>                                               <font color="Blue" style="padding: 0px 0px 0px 0px;">Night Swimming (6:00pm-4:00am)</font></h4>
                  <table border="3" bordercolor="#00CC66" style="width:100%">
                    <tr border="3">
                      <td>Adult</td>
                      <td>150.00php</td>  
                      <td>150.00php</td> 
                    </tr>
                    <tr border="3">
                      <td>Kid</td>
                      <td>120.00php</td>  
                      <td>120.00php</td>  
                    </tr>
                  </table>
                </td>
                <br>
                <h3><font color="green">Swimming Rates: WEEKENDS HOLIDAYS</font></h3>
                <td>  
                  <h4>
                    <font color="red" style="padding: 10px 120px 0px 200px;">Day Swimming (8:00am-5:00pm)</font>
                    <font color="Blue" style="padding: 0px 0px 0px 0px;">Night Swimming (6:00pm-4:00am)</font>
                  </h4>
                  <table border="3" bordercolor="#00CC66" style="width:100%">
                    <tr border="3">
                      <td>Adult</td>
                      <td>150.00php</td>  
                      <td>170.00php</td> 
                    </tr>
                    <tr border="3">
                      <td>Kid</td>
                      <td>120.00php</td>  
                      <td>140.00php</td>  
                    </tr>
                  </table>
                </td>
                <br>
                <h3><font color="green">COTTAGES RATES</font></h3>
                  <td>  
                      <h4>
                          <font color="red" style="padding: 10px 300px 0px 300px;">Capacity</font>
                          <font color="Blue" style="padding: 0px 0px 0px 0px;">Price</font>
                       </h4>
                      <table border="3" bordercolor="#00CC66" style="width:100%">
                        <tr border="3">
                          <td>Cottage 1,2,3,4,5,6,7,8,9<br>(Main Pool)</td>
                          <td>Good for 12pax</td> 
                          <td>600.00php</td> 
                        </tr>
                        <tr border="3">
                          <td>Cottage 10,11,12,13,14<br>(Kiddie Pool)</td>
                          <td>Good for 20pax</td> 
                          <td>800.00php</td>   
                        </tr>
                        <tr  border="3">
                          <td>Cottage 15,16,17,18,19,20,21,22<br>(Olympic Pool)</td>
                          <td>Good for 15pax</td> 
                          <td>1000.00php</td>    
                        </tr>
                        <tr border="3">
                          <td>KUBO (Hawaian, Coconut Royal,Palmera,Phoenix<br>(Along Kiddie Pool)</td>
                          <td>Good for 15pax</td> 
                          <td>1000.00php</td>    
                        </tr>
                        <tr border="3">
                          <td>Pavillion 1st<br>(Cottage with Videoke Machine )</td>
                          <td>Good for 30pax</td> 
                          <td>2500.00php</td>    
                        </tr>
                        <tr border="3">
                          <td>Pavillion 2nd<br>(Cottage with Videoke Machine )</td>
                          <td>Good for 40pax</td> 
                          <td>2500.00php</td>    
                        </tr>
                    </table>
                  </td>
                  <br>
                  <h3>
                    <font color="green">CORKAGE FEE</font>
                  </h3>
                  <table border="3" bordercolor="#00CC66" style="width:100%" style="alignment-adjust:central">
                    <tr border="3">
                      <br>
                      <td><br>
                        Beer/Sanmig Light - 10.00 per bottle<br>
                        Softdrinks 1.5L   - 20.00 per bottle<br>
                        Redhorse   1L     - 20.00 per bottle<br>
                        Emperador  1L     - 20.00 per bottle<br>
                      </td>
                    </tr>
                  </table>
                  <br>
                  <h3>
                    <font color="green">RULES</font>
                  </h3>
                <table border="3" bordercolor="#00CC66" style="width:100%" style="alignment-adjust:central">
                  <tr border="3">
                    <br>
                    <td><br>
                      • Please wear proper swimming attire-(pants, colored shirts except white and any maong wear are not allowed) 
                      <br>
                      •  2 yrs. Old below are free.<br>
                      •  No pets allowed.<br>
                      •  Pool Maintenanc: Morning Schedule 5:00am-9:am.<br>
                      •  Pool Maintenanc: Afternoon Schedule 5:00pm-6:pm.<br>
                    </td>
                  </tr>
              </table>
               </div>
            </form>
            <div class="clearfix"></div>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
       <div class="clearfix"> </div>
    </div>


@include('includes.footer')
@stop