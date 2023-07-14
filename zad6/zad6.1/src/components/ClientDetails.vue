<template>
  <div>
    <h1>Client Details</h1>
    <p>Name: {{ client.name }}</p>
    <p>Employee: {{ client.employee }}</p>
    <p>Last Purchases: {{ client.lastPurchases }}</p>
    <p>Total Spendings: {{ client.totalSpendings }}</p>
    <p>Car: {{ client.car }}</p>
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      client: {
        id: this.id,
        name: '',
        employee: '',
        lastPurchases: [],
        totalSpendings: 0,
        car: '',
      },
    };
  },
  created() {
    // Fetch client details based on the provided ID
    // You can make an API request or fetch data from a local data store
    // Here, I'm using dummy data for demonstration purposes
    this.client = {
      id: this.id,
      name: 'John',
      employee: 'Alice',
      lastPurchases: ['Item 1', 'Item 2', 'Item 3'],
      totalSpendings: 500,
      car: 'Car A',
    };
  },
};
</script>