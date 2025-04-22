document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.toggle-btn');
    const tables = document.querySelectorAll('.table');
    let currentActive = null;

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            if (currentActive) {
                currentActive.classList.remove('active');
                currentActive.disabled = false;
                tables.forEach(el => {
                    if (el.id === currentActive.getAttribute('id')) {
                        foundBeforeElement = el;
                    }
                });
                foundBeforeElement.classList.remove('tableActive')
            }
            tables.forEach(el => {
                if (el.id === this.getAttribute('id')) {
                    foundElement = el;
                }
            });
            foundElement.classList.add('tableActive')
            this.classList.add('active');
            this.disabled = true;
            currentActive = this;
        });
    });
});