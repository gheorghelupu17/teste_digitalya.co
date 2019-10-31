<head>
    <title> Test</title>
</head>

<body>
<form action="save" method="POST">
    @csrf
    <h2>First name</h2>
    <input type="text" name="first_name" placeholder="first name">
    <h2>Middle Name</h2>
    <input type="text" name="middlen_name" placeholder="middle_name">
    <h2>Last name</h2>
    <input type="text" name="last_name" placeholder="last_name">
    <h2>Gender</h2>
    <input type="radio" name="gender" value="0">Male
    <input type="radio" name="gender" value="1">Female

    <h2>Relationship</h2>
    <select name="relationship">
        <option value="1">GrandParent</option>
        <option value="2">Parent</option>
        <option value="3">Child</option>
    </select>
    <h2>Select related family member</h2>
    <select name="family_member">
        <option value="0">Nimeni</option>
        @foreach($family as $n)
        <option value="{{$n['id']}}">{{$n['first_name']}} {{$n['last_name']}}</option>
            @endforeach
    </select>
    <input type="submit" value="Save member">



</form>

<ul>
    @foreach($family as $n)
        <li>{{$n['first_name']}} {{$n['last_name']}} <a href="{{route('show',$n['id'])}}">Arata</a> <a href="{{route('delete',$n['id'])}}">Sterge</a>  <a href="{{route('update',$n['id'])}}">Update</a>   </li>
        @endforeach
</ul>

</body>
