<div x-data="{
    items: [
        {
            name: "John Doe",
            email: "johndoe@example.com"
        },
        {
            name: "Jane Doe",
            email: "janedoe@example.com"
        }
    ],
    search: ""
}">

    <input type="text" placeholder="Search" x-on:keyup="search = $event.target.value" />

    <ul class="list-unstyled">
        <template x-for="item in items | filterBy search">
            <li x-text="item.name">

            </li>
        </template>
    </ul>

</div>