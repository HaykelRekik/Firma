@extends('layouts.app')
@section('content')
<!-- <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h5 class="title">Notifications</h5>
              </div>
              <div class="card-body "> -->
              <div class="container pt-5 pb-5">

<form id="app">

<section v-if="step == 1">
    <h3>step1</h3>
    <input v-model="firstname" type="text" class="form-control form-control-lg" placeholder="what is your firstname?">
    <input v-model="lastname" type="text" class="form-control form-control-lg" placeholder="what is your lastname?">
</section>

<section v-if="step == 2">
    <h3>step2</h3>
    <input v-model="phone" type="tel" class="form-control form-control-lg" placeholder="what is your phone?">
    <input v-model="email" type="email" class="form-control form-control-lg" placeholder="what is your email?">
</section>

<section v-if="step == 3">
    <h3>step3</h3>
    <input v-model="password" type="password" class="form-control form-control-lg" placeholder="what is your password?">
</section>


<button @click.prevent="nextstep">Next Step</button>
<button @click.prevent="creatuser">Submit</button>
<button @click.prevent="getusers">get users</button>
<button @click.prevent="getuser">get user</button>


</form>


</div>


@endsection