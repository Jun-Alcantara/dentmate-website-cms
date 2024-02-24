<script setup></script>

<template>
  <div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      <slot/>
    
    </div> 
    <div class="drawer-side">
      <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label> 
      <ul class="menu p-4 w-80 min-h-full bg-fontPrimary text-base-content">
        <!-- Sidebar content here -->
        <li class="border-b-[1px] border-white mb-5">
          <h1 class="text-fontSecondary text-xl font-bold">Dentmate Website CMS</h1>
        </li>
        <li>
          <a class="text-white bg-[#00B2FF]">
            <i class="fa fa-home"></i>
            Homepage
          </a>
        </li>
        <li>
          <a class="text-white">
            <i class="fa fa-tools"></i>
            Services
          </a>
        </li>
        <li>
          <a class="text-white">
            <i class="fa fa-store"></i>
            Branches
          </a>
        </li>
        <li>
          <a class="text-white">
            <i class="fa fa-users"></i>
            Doctors
          </a>
        </li>
        <li class="mt-auto">
          <a class="text-white">
            <i class="fa fa-sign-out"></i>
            Logout
          </a>
        </li>
      </ul>
    
    </div>
  </div>
</template>