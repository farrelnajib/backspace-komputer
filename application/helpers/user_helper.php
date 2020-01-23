<?php

function isAdmin()
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') == 1) {
        return true;
    } else {
        return false;
    }
}

function setSession()
{
    $ci = get_instance();
    $data = [
        'id' => $ci->session->userdata('id'),
        'name' => $ci->session->userdata('name'),
        'email' => $ci->session->userdata('email'),
        'role_id' => $ci->session->userdata('role_id'),
        'isLoggedIn' => true,
        'last_activity' => time() + 60 * 5
    ];
    $ci->session->set_userdata($data);
}

function deleteSession()
{
    $ci = get_instance();
    $ci->session->unset_userdata('name');
    $ci->session->unset_userdata('email');
    $ci->session->unset_userdata('id');
    $ci->session->set_userdata('isLoggedIn', false);
    $ci->session->unset_userdata('last_activity');
}
