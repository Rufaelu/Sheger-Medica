<div>Hello admin</div>

@if($role == 'admin')
    <div>Hello admin</div>
@elseif($role == 'practitioner')
    <div>Hello practitioner</div>
@elseif($role == 'user')
    <div>Hello user</div>
@endif
