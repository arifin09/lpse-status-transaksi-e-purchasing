# lpse-status-transaksi-e-purchasing

[![Join the chat at https://gitter.im/status-transaksi-e-purchasing/Lobby](https://badges.gitter.im/status-transaksi-e-purchasing/Lobby.svg)](https://gitter.im/status-transaksi-e-purchasing/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/status-transaksi-e-purchasing/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/status-transaksi-e-purchasing/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/status-transaksi-e-purchasing/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/status-transaksi-e-purchasing/build-status/master)

Status Transaksi e-Purchasing

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/lpse-status-transaksi-e-purchasing:dev-master
```
- Latest release:


## download via github
~~~
bash
$ git clone https://github.com/bantenprov/status-transaksi-e-purchasing.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\StatusTransaksiEpurchasing\StatusTransaksiEpurchasingServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=status-transaksi-e-purchasing-assets
$ php artisan vendor:publish --tag=status-transaksi-e-purchasing-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/status-transaksi-e-purchasing',
    components: {
      main: resolve => require(['./components/views/bantenprov/status-transaksi-e-purchasing/DashboardStatusTransaksiEpurchasing.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Status Transaksi e-Purchasing"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/status-transaksi-e-purchasing',
      components: {
        main: resolve => require(['./components/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Status Transaksi e-Purchasing"
      }
    }
 //== ...
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Status Transaksi e-Purchasing',
          link: '/dashboard/status-transaksi-e-purchasing',
          icon: 'fa fa-angle-double-right'
        }
  ]
},

```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import StatusTransaksiEpurchasing from './components/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasing.chart.vue';
Vue.component('echarts-status-transaksi-e-purchasing', StatusTransaksiEpurchasing);

import StatusTransaksiEpurchasingKota from './components/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingKota.chart.vue';
Vue.component('echarts-status-transaksi-e-purchasing-kota', StatusTransaksiEpurchasingKota);

import StatusTransaksiEpurchasingTahun from './components/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingTahun.chart.vue';
Vue.component('echarts-status-transaksi-e-purchasing-tahun', StatusTransaksiEpurchasingTahun);

import StatusTransaksiEpurchasingAdminShow from './components/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingAdmin.show.vue';
Vue.component('admin-view-status-transaksi-e-purchasing-tahun', StatusTransaksiEpurchasingAdminShow);

//== Echarts Angka Partisipasi Kasar

import StatusTransaksiEpurchasingBar01 from './components/views/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingBar01.vue';
Vue.component('status-transaksi-e-purchasing-bar-01', StatusTransaksiEpurchasingBar01);

import StatusTransaksiEpurchasingBar02 from './components/views/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingBar02.vue';
Vue.component('status-transaksi-e-purchasing-bar-02', StatusTransaksiEpurchasingBar02);

//== mini bar charts
import StatusTransaksiEpurchasingBar03 from './components/views/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingBar03.vue';
Vue.component('status-transaksi-e-purchasing-bar-03', StatusTransaksiEpurchasingBar03);

import StatusTransaksiEpurchasingPie01 from './components/views/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingPie01.vue';
Vue.component('status-transaksi-e-purchasing-pie-01', StatusTransaksiEpurchasingPie01);

import StatusTransaksiEpurchasingPie02 from './components/views/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingPie02.vue';
Vue.component('status-transaksi-e-purchasing-pie-02', StatusTransaksiEpurchasingPie02);

//== mini pie charts
import StatusTransaksiEpurchasingPie03 from './components/views/bantenprov/status-transaksi-e-purchasing/StatusTransaksiEpurchasingPie03.vue';
Vue.component('status-transaksi-e-purchasing-pie-03', StatusTransaksiEpurchasingPie03);
```