@extends('academics.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Academic Staff Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('academics.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('academics.update',$academic->staffid) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Staff ID:</strong>
                    <input type="text" name="staffid" value="{{$academic->staffid}}"  class="form-control" placeholder="Enter Staff ID">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role ID:</strong>
                    <select type="text" name="roleid" class="form-control" placeholder="Select Role ID">
                        <option value = "1" @if($academic->roleid=="1") selected @endif >1</option>
                        <option value = "2" @if($academic->roleid=="2") selected @endif>2</option>
                        <option value = "3" @if($academic->roleid=="3") selected @endif>3</option>
                        <option value = "4" @if($academic->roleid=="4") selected @endif>4</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="fullname" value="{{ $academic->fullname }}" class="form-control" placeholder="Enter Full Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date of Birth:</strong>
                    <input type="date" name="dob" value="{{ $academic->dob }}" class="form-control" placeholder="Select your date of birth" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <input type="radio" name="gender" value="Male" class="form-control" {{ $academic->gender == 'Male' ? 'Checked' :''}}>Male<br>
                    <input type="radio" name="gender" value="Female" class="form-control"{{ $academic->gender == 'Female' ? 'Checked' :''}}>Female<br>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIC:</strong>
                    <input type="text" name="nic" value="{{ $academic->nic }}" class="form-control" placeholder="XXXXXXXXXV">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permanant Address:</strong>
                    <textarea class="form-control" style="height:150px" name="paddress" placeholder="Enter Permanant address">{{ $academic->paddress }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Current Address:</strong>
                    <textarea class="form-control" style="height:150px" name="caddress" placeholder="Enter Current address">{{ $academic->caddress }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact No:</strong>
                    <input type="text" name="contact" value="{{ $academic->contact }}"  class="form-control" placeholder="Enter contact no">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email Address:</strong>
                    <input type="email" name="email" value="{{ $academic->email }}"  class="form-control" placeholder="Enter Email address">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Designation:</strong>
                    <select type="text" name="profession" class="form-control" placeholder="Select your profession">
                        <option value = "Principal" @if($academic->profession=="Principal") selected @endif>Principal</option>
                        <option value = "Vice Principal" @if($academic->profession=="Vice Principal") selected @endif>Vice Principal</option>
                        <option value = "Secretory" @if($academic->profession=="Secretory") selected @endif>Secretory</option>
                        <option value = "Sectional Head" @if($academic->profession=="Sectional Head") selected @endif>Sectional Head</option>
                        <option value = "Teacher" @if($academic->profession=="Teacher") selected @endif>Teacher</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Qualifications:</strong>
                    <textarea class="form-control" style="height:150px" name="qualifications" placeholder="Enter your qualifications">{{ $academic->qualifications }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Experience:</strong>
                    <input type="text" name="experience" value="{{ $academic->experience }}" class="form-control" placeholder="Enter experience in years">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Departmant:</strong>
                    <select type="text" name="department" class="form-control" placeholder="Select your department">
                        <option value = "School Head Office" @if($academic->department=="School Head Office") selected @endif>School Head Office</option>
                        <option value = "English" @if($academic->department=="English") selected @endif>English</option>
                        <option value = "Mathematics" @if($academic->department=="Mathematics") selected @endif>Mathematics</option>
                        <option value = "Science" @if($academic->department=="Science") selected @endif>Science</option>
                        <option value = "IT" @if($academic->department=="IT") selected @endif>IT</option>
                        <option value = "Aesthetics" @if($academic->department=="Aesthetics") selected @endif>Aesthetics</option>
                        <option value = "Home Science" @if($academic->department=="Home Science") selected @endif>Home Science</option>
                        <option value = "Sinhala" @if($academic->department=="Sinhala") selected @endif>Sinhala</option>
                        <option value = "Buddhism" @if($academic->department=="Buddhism") selected @endif>Buddhism</option>
                        <option value = "PTS" @if($academic->department=="PTS") selected @endif>PTS</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Leave Balance:</strong>
                    <select type="text" name="leavebalance" class="form-control" placeholder="Select leave balance">
                        <option value = "1" @if($academic->leavebalance=="1") selected @endif >1</option>
                        <option value = "2" @if($academic->leavebalance=="2") selected @endif>2</option>
                        <option value = "3" @if($academic->leavebalance=="3") selected @endif>3</option>
                        <option value = "4" @if($academic->leavebalance=="4") selected @endif>4</option>
                        <option value = "5" @if($academic->leavebalance=="5") selected @endif >5</option>
                        <option value = "6" @if($academic->leavebalance=="6") selected @endif>6</option>
                        <option value = "7" @if($academic->leavebalance=="7") selected @endif>7</option>
                        <option value = "8" @if($academic->leavebalance=="8") selected @endif>8</option>
                        <option value = "9" @if($academic->leavebalance=="9") selected @endif >9</option>
                        <option value = "10" @if($academic->leavebalance=="10") selected @endif>10</option>
                        <option value = "11" @if($academic->leavebalance=="11") selected @endif>11</option>
                        <option value = "12" @if($academic->leavebalance=="12") selected @endif>12</option>
                        <option value = "13" @if($academic->leavebalance=="13") selected @endif >13</option>
                        <option value = "14" @if($academic->leavebalance=="14") selected @endif>14</option>
                        <option value = "15" @if($academic->leavebalance=="15") selected @endif>15</option>
                        <option value = "16" @if($academic->leavebalance=="16") selected @endif>16</option>
                        <option value = "17" @if($academic->leavebalance=="17") selected @endif >17</option>
                        <option value = "18" @if($academic->leavebalance=="18") selected @endif>18</option>
                        <option value = "19" @if($academic->leavebalance=="19") selected @endif>19</option>
                        <option value = "20" @if($academic->leavebalance=="20") selected @endif>20</option>
                        <option value = "21" @if($academic->leavebalance=="21") selected @endif >21</option>
                        <option value = "22" @if($academic->leavebalance=="22") selected @endif>22</option>
                        <option value = "23" @if($academic->leavebalance=="23") selected @endif>23</option>
                        <option value = "24" @if($academic->leavebalance=="24") selected @endif>24</option>
                        <option value = "25" @if($academic->leavebalance=="25") selected @endif >25</option>
                        <option value = "26" @if($academic->leavebalance=="26") selected @endif>26</option>
                        <option value = "27" @if($academic->leavebalance=="27") selected @endif>27</option>
                        <option value = "28" @if($academic->leavebalance=="28") selected @endif>28</option>
                        <option value = "29" @if($academic->leavebalance=="29") selected @endif >29</option>
                        <option value = "30" @if($academic->leavebalance=="30") selected @endif>30</option>
                        <option value = "31" @if($academic->leavebalance=="31") selected @endif>31</option>
                        <option value = "32" @if($academic->leavebalance=="32") selected @endif>32</option>
                        <option value = "33" @if($academic->leavebalance=="33") selected @endif >33</option>
                        <option value = "34" @if($academic->leavebalance=="34") selected @endif>34</option>
                        <option value = "35" @if($academic->leavebalance=="35") selected @endif>35</option>
                        <option value = "36" @if($academic->leavebalance=="36") selected @endif>36</option>
                        <option value = "37" @if($academic->leavebalance=="37") selected @endif >37</option>
                        <option value = "38" @if($academic->leavebalance=="38") selected @endif>38</option>
                        <option value = "39" @if($academic->leavebalance=="39") selected @endif>39</option>
                        <option value = "40" @if($academic->leavebalance=="40") selected @endif>40</option>
                        <option value = "41" @if($academic->leavebalance=="41") selected @endif>41</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" value="{{ $academic->username }}" class="form-control" placeholder="Enter a username">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="passsword" value="{{ $academic->passsword }}" class="form-control" placeholder="Enter a valid password">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" name="confirmpassword" value="{{ $academic->confirmpassword }}" class="form-control" placeholder="Confirm your password">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Registered Date:</strong>
                    <input type="date" name="regdate" value="{{ $academic->regdate}}" class="form-control" placeholder="dd/MM/yyyy">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </form>

@endsection