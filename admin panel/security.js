document.addEventListener('DOMContentLoaded', function() {
    const rolesTableBody = document.querySelector('#rolesTable tbody');
    const securitySettingsForm = document.getElementById('securitySettingsForm');

    // Example data for user roles and permissions
    const roles = [
        { id: 1, role: 'Admin', permissions: 'All', actions: '<button class="btn btn-sm btn-info edit-role" data-id="1">Edit</button>' },
        { id: 2, role: 'Moderator', permissions: 'Manage users', actions: '<button class="btn btn-sm btn-info edit-role" data-id="2">Edit</button>' },
        { id: 3, role: 'User', permissions: 'View content', actions: '<button class="btn btn-sm btn-info edit-role" data-id="3">Edit</button>' }
    ];

    // Populate roles table
    roles.forEach(role => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${role.id}</td>
            <td>${role.role}</td>
            <td>${role.permissions}</td>
            <td>${role.actions}</td>
        `;
        rolesTableBody.appendChild(row);
    });

    // Handle security settings form
    securitySettingsForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Collect form data
        const changePassword = document.getElementById('changePassword').value;
        const twoFactorAuth = document.getElementById('twoFactorAuth').checked;
        const securityQuestions = document.getElementById('securityQuestions').value;
        const securityAnswer = document.getElementById('securityAnswer').value;

        // Process and save settings (this is a placeholder)
        alert(`Settings saved:
        - Change Password: ${changePassword}
        - Two-Factor Authentication: ${twoFactorAuth ? 'Enabled' : 'Disabled'}
        - Security Question: ${securityQuestions}
        - Security Answer: ${securityAnswer}`);

        // Reset form
        securitySettingsForm.reset();
    });

    // Handle edit button clicks
    rolesTableBody.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-role')) {
            const roleId = event.target.getAttribute('data-id');
            // Implement your edit functionality here
            alert(`Edit button clicked for role ID: ${roleId}`);
        }
    });
});
