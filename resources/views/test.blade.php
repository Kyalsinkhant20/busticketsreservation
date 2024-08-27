@extends('user.layout')
@section('title','Reservation')
@section('content')
@include('flash-messages')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket Booking</title>
    <!--Google Fonts and Icons-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        width: 100%;
        height: 100vh;
        margin: 0;
        padding: 0;
        background-color: aliceblue;
        color:darkblue;
        
      }
      .center {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: aliceblue;
      }
      .tickets {
        width: 550px;
        height: fit-content;
        border: 0.4mm solid rgba(0, 0, 0, 0.08);
        border-radius: 3mm;
        box-sizing: border-box;
        padding: 10px;
        font-family: poppins;
        max-height: 96vh;
        overflow: auto;
        background: white;
        box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25);
      }
      .ticket-selector {
        background: rgb(243, 243, 243);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
        box-sizing: border-box;
        padding: 20px;
      }
      .head {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
      }
      .title {
        font-size: 16px;
        font-weight: 600;
        color:darkblue;
        font-style: oblique;
      }
      .seats {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        min-height: 150px;
        position: relative;
      }
      .status {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
      }
      .seats::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0);
        width: 220px;
        height: 7px;
        background: rgb(141, 198, 255);
        border-radius: 0 0 3mm 3mm;
        border-top: 0.3mm solid rgb(180, 180, 180);
      }
      .item {
        font-size: 12px;
        position: relative;
      }
      .item::before {
        content: "";
        position: absolute;
        top: 50%;
        left: -12px;
        transform: translate(0, -50%);
        width: 10px;
        height: 10px;
        background: rgb(255, 255, 255);
        outline: 0.2mm solid rgb(120, 120, 120);
        border-radius: 0.3mm;
      }
      .item:nth-child(2)::before {
        background: rgb(180, 180, 180);
        outline: none;
      }
      .item:nth-child(3)::before {
        background: rgb(28, 185, 120);
        outline: none;
      }
      .all-seats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 15px;
    margin: 60px 0;
    margin-top: 20px;
    position: relative;
}

      .seat {
        width: 20px;
        height: 20px;
        background: white;
        border-radius: 0.5mm;
        outline: 0.3mm solid rgb(180, 180, 180);
        cursor: pointer;
      }
      .all-seats input:checked + label {
        background: rgb(28, 185, 120);
        outline: none;
      }
      .seat.booked {
        background: rgb(180, 180, 180);
        outline: none;
      }
      input {
        display: none;
      }
      .timings {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 30px;
      }
      .dates {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .dates-item {
        width: 50px;
        height: 40px;
        background: rgb(233, 233, 233);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 10px 0;
        border-radius: 2mm;
        cursor: pointer;
      }
      .day {
        font-size: 12px;
      }
      .times {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
      }
      .time {
        font-size: 14px;
        width: fit-content;
        padding: 7px 14px;
        background: rgb(233, 233, 233);
        border-radius: 2mm;
        cursor: pointer;
      }
      .timings input:checked + label {
        background: rgb(28, 185, 120);
        color: white;
      }
      .price {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .total {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        font-size: 16px;
        font-weight: 500;
      }
      .total span {
        font-size: 11px;
        font-weight: 400;
      }
      .price button {
        background: rgb(60, 60, 60);
        color: white;
        font-family: poppins;
        font-size: 14px;
        padding: 7px 14px;
        border-radius: 2mm;
        outline: none;
        border: none;
        cursor: pointer;
      }
      .driver{
        color:red;
      }


    </style>
  </head>
  
    <main>
    <form action="{{route('seats.store')}}" method="post" id="myForm">
    @csrf
    @method('POST')
    <div class="center">
      <div class="tickets">
        <div class="ticket-selector">
          <div class="head">
            <div class="title">Please Select Your Seat</div>
          </div>
          <div class="seats">
            <div class="status">
              <div class="item">Available</div>
              <div class="item">Booked</div>
              <div class="item">Selected</div>
            </div>
            
            <button type="button" class="btn btn-secondary">Driver</button>
            <div class="all-seats">            
            <label for="s1" class="seat">
            <input type="checkbox" name="tickets" id="s1" value="A1" class="test">A1
            </label>
            <label for="s2" class="seat">
            <input type="checkbox" name="tickets" id="s2" value="A2" class="seat booked">A2
            </label>
            <label for="s3" class="seat">
            <input type="checkbox" name="tickets" id="s3" value="A3" class="test">A3
            </label>          
            <label for="s4" class="seat booked">
           <input type="checkbox" name="tickets" id="s4"  value="B1" class="test">B1
          </label>

           <label for="s5" class="seat ">
           <input type="checkbox" name="tickets" id="s5" value="B2" class="test">B2
          </label>
           
            <label for="s6" class="seat booked">
            <input type="checkbox" name="tickets" id="s6" value="B3" class="test">B3
          </label>

            <label for="s7" class="seat booked">
            <input type="checkbox" name="tickets" id="s7" value="C1" class="test">C1
          </label>

            <label for="s8" class="seat "> 
            <input type="checkbox" name="tickets" id="s8" value="C2" class="test">C2
          </label>

            <label for="s7" class="seat booked">
            <input type="checkbox" name="tickets" id="s7" value="C3" class="test">C3
          </label>

            <label for="s8" class="seat booked">
            <input type="checkbox" name="tickets" id="s8" value="D1" class="test">D1
          </label>

            
            <label for="s9" class="seat booked">
            <input type="checkbox" name="tickets" id="s9" value="D2" class="test">D2
          </label>
            
            <label for="s10" class="seat ">
            <input type="checkbox" name="tickets" id="s10" value="D3" class="test">D3
          </label>

            <label for="s11" class="seat ">
            <input type="checkbox" name="tickets" id="s11" value="E1" class="test">E1
          </label>

            <label for="s12" class="seat ">
            <input type="checkbox" name="tickets" id="s12" value="E2" class="test">E2
          </label>

            <label for="s13" class="seat ">
            <input type="checkbox" name="tickets" id="s13" value="E3" class="test">E3
          </label>

            <label for="s14" class="seat ">
            <input type="checkbox" name="tickets" id="s14" value="F1" class="test">F1
          </label>

            <label for="s15" class="seat ">
            <input type="checkbox" name="tickets" id="s15" value="F2" class="test">F2
          </label>
          
            <input type="checkbox" name="tickets" id="s16" value="F3" class="test">
            <label for="s16" class="seat booked">F3</label>

            
            <label for="s17" class="seat booked">
            <input type="checkbox" name="tickets" id="s17" value="G1" class="test">G1
          </label>

            
            <label for="s18" class="seat booked">
            <input type="checkbox" name="tickets" id="s18" value="G2" class="test">G2
          </label>

           
            <label for="s19" class="seat booked">
            <input type="checkbox" name="tickets" id="s19" value="G3" class="test">G3
          </label>

            
            <label for="s20" class="seat ">
            <input type="checkbox" name="tickets" id="s20" value="H1" class="test">H1
          </label>
            
            <label for="s21" class="seat ">
            <input type="checkbox" name="tickets" id="s21" value="H2" class="test">H2
          </label>
            
            <label for="s22" class="seat ">
              <input type="checkbox" name="tickets" id="s22" value="H3" class="test">H3
            </label>
            
            <label for="s23" class="seat ">
            <input type="checkbox" name="tickets" id="s23" value="I1" class="test">I1
          </label>

            <label for="s24" class="seat ">
            <input type="checkbox" name="tickets" id="s24" value="I2" class="test">I2
          </label>
            
            <label for="s25" class="seat ">
            <input type="checkbox" name="tickets" id="s25" value="I3" class="test">I3
          </label>

            
            <label for="s26" class="seat ">
            <input type="checkbox" name="tickets" id="s26" value="J1" class="test">J1
          </label>

            <label for="s1" class="seat ">
            <input type="checkbox" name="ticketss" id="s27" value="J2" class="test">J2
            </label>
            
            <label for="s28" class="seat">
            <input type="checkbox" name="tickets" id="s28" value="J3" class="test">J3
            </label>

            </div>
          </div>
          
           
        <div class="price">
          <div class="total">
            <span> <span class="count">0</span> Tickets </span>
            <div class="amount">0</div>
          </div>
          <div class="">
          <span> <span class="seat_no"></span></span>
          <div class="">Your Seats</div>
          </div>
         <a href="{{route('reserves.create','amount,seat_no')}}"> <button type="button">Book</button></a>
    </form>
        </div>
      </div>
    </div>
    <script>
      let seats = document.querySelector(".all-seats");
      for (var i = 0; i < 30; i++) {
        let randint = Math.floor(Math.random() * 2);
        let booked = randint === 1 ? "booked" : "";
        seats.insertAdjacentHTML(
          "beforeend",
          '<input type="checkbox" name="tickets" id="s' +
            (i + 2) +
            '" /><label for="s' +
            (i + 2) +
            '" class="seat ' +
            booked +
            '"></label>'
        );
      }

      let tickets = seats.querySelectorAll("input");
      
      tickets.forEach((ticket) => {
        ticket.addEventListener("change", () => {
          let amount = document.querySelector(".amount").innerHTML;
          let count = document.querySelector(".count").innerHTML;
          let seat_no =document.querySelector(".seat_no").innerHTML;
          amount = Number(amount);
          count = Number(count);
          seat_no =String(seat_no);
          if (ticket.checked) {
            count += 1;
            amount += 39000;
           if(ticket.value != null){
            seat_no += ticket.value; 
           }
           else{
            seat_no == 0;
           }
                      
            
          } else {
            count -= 1;
            amount -= 39000;
          }
          document.querySelector(".amount").innerHTML = amount;
          document.querySelector(".count").innerHTML = count;
          document.querySelector(".seat_no").innerHTML = seat_no;
        });
      });
 </script>

    </main>
</html>
@endsection