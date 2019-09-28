import BucketListList from '../components/bucketlist/List'
import BucketListCreate from '../components/bucketlist/Create'
import BucketListUpdate from '../components/bucketlist/Update'
import BucketListShow from '../components/bucketlist/Show'

export default [
  { name: 'BucketListList', path: '/bucket_lists/', component: BucketListList },
  { name: 'BucketListCreate', path: '/bucket_lists/create', component: BucketListCreate },
  { name: 'BucketListUpdate', path: '/bucket_lists/edit/:id', component: BucketListUpdate },
  { name: 'BucketListShow', path: '/bucket_lists/show/:id', component: BucketListShow }
]
