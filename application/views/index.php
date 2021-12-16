<?php

$this->load->view('tmp/header', $user);

$this->load->view($content);

$this->load->view('tmp/footer');
