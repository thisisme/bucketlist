<template>
  <div class="container">
    <nav>
      <ul class="nav nav-justified">
        <li class="active">
          <router-link :to="{ name: 'BucketListList' }" class="active">
            Bucket
          </router-link>
        </li>
      </ul>
    </nav>

    <div>
      <router-view></router-view>
    </div>
  </div>
</template>