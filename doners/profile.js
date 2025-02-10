document.addEventListener('DOMContentLoaded', () => {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const profileForm = document.getElementById('profileForm');

    if (editProfileBtn && profileForm) {
        editProfileBtn.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent the default action of the button
            
            // Smooth scroll to the form
            profileForm.scrollIntoView({ behavior: 'smooth' });
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('profileForm');
        const successAlert = document.getElementById('successAlert');
        const saveChangesBtn = document.getElementById('saveChangesBtn');
    
        if (form && successAlert) {
            form.addEventListener('submit', (event) => {
                event.preventDefault(); // Prevent the default form submission
    
                // Simulate form submission and show success message
                setTimeout(() => {
                    successAlert.style.display = 'block'; // Show the success alert
                    form.reset(); // Optionally reset the form
                    window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll to the top
                }, 500); // Simulate a short delay for form submission
            });
        }
    });
    
    
    
});
