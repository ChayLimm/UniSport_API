{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Races" icon="la la-question" :link="backpack_url('race')" />
<x-backpack::menu-item title="Segments" icon="la la-question" :link="backpack_url('segment')" />
<x-backpack::menu-item title="Participants" icon="la la-question" :link="backpack_url('participant')" />
<x-backpack::menu-item title="Checkpoints" icon="la la-question" :link="backpack_url('checkpoint')" />