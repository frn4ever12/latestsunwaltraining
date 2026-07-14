var dateElements = document.querySelectorAll(".nepali-datepicker");
dateElements.forEach(function (dateElement) {
    dateElement.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
    });
});

document.addEventListener('DOMContentLoaded', function() {
    
    const currentUrl = window.location.href;

    const collapsedItems = JSON.parse(localStorage.getItem('collapsedItems')) || {};

    function setCollapseState() {
      const items = document.querySelectorAll('.nav-item > a[data-bs-toggle="collapse"]');
      items.forEach(item => {
        const targetId = item.getAttribute('href');
        if (collapsedItems[targetId]) {
          item.classList.remove('collapsed');
          document.querySelector(targetId).classList.add('show');
        } else {
          item.classList.add('collapsed');
          document.querySelector(targetId).classList.remove('show');
        }
      });
    }

    setCollapseState();

    const toggleItems = document.querySelectorAll('.nav-item > a[data-bs-toggle="collapse"]');
    toggleItems.forEach(item => {
      item.addEventListener('click', function() {
        const targetId = this.getAttribute('href');

        const isOpen = collapsedItems[targetId];

        toggleItems.forEach(otherItem => {
          const otherTargetId = otherItem.getAttribute('href');
          if (otherTargetId !== targetId) {
            collapsedItems[otherTargetId] = false;
            otherItem.classList.add('collapsed');
            document.querySelector(otherTargetId).classList.remove('show');
          }
        });

        collapsedItems[targetId] = !isOpen; 
        localStorage.setItem('collapsedItems', JSON.stringify(collapsedItems));

        this.classList.toggle('collapsed', !collapsedItems[targetId]);
        document.querySelector(targetId).classList.toggle('show', collapsedItems[targetId]);
      });
    });

    toggleItems.forEach(item => {
      const targetId = item.getAttribute('href');
      if (currentUrl.includes(targetId)) {
        collapsedItems[targetId] = true;
        item.classList.remove('collapsed');
        document.querySelector(targetId).classList.add('show');
      }
    });

    localStorage.setItem('collapsedItems', JSON.stringify(collapsedItems));
  });
