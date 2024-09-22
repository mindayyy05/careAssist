<div>
    <!-- Your component's HTML goes here -->
    <form wire:submit.prevent="updateApiToken">
        <div>
            <label>Permissions:</label>
            <input type="checkbox" wire:model="updateApiTokenForm.permissions" value="delete"> Delete
            <input type="checkbox" wire:model="updateApiTokenForm.permissions" value="read"> Read
            <input type="checkbox" wire:model="updateApiTokenForm.permissions" value="create"> Create
        </div>
        <button type="submit">Update Token</button>
    </form>
</div>
