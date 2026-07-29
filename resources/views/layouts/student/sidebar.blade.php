<flux:sidebar
    sticky
    collapsible="mobile"
    class="border-r border-zinc-200 bg-white dark:bg-zinc-900 dark:border-zinc-700">

    <flux:sidebar.header>

        <x-app-logo
            :sidebar="true"
            :href="route('student.dashboard')"/>

        <flux:sidebar.collapse class="lg:hidden"/>

    </flux:sidebar.header>

    <flux:sidebar.nav>

        <flux:sidebar.group heading="Menu">

            <flux:sidebar.item
                icon="home"
                :href="route('student.dashboard')"
                :current="request()->routeIs('student.dashboard')">

                Dashboard

            </flux:sidebar.item>

            <flux:sidebar.item
                icon="document-plus"
                :href="route('student.dispensation.create')"
                :current="request()->routeIs('student.dispensation.create')">

                Ajukan Dispensasi

            </flux:sidebar.item>

        </flux:sidebar.group>

    </flux:sidebar.nav>

    <flux:spacer/>

    <form method="POST"
          action="{{ route('student.logout') }}"
          class="p-4">

        @csrf

        <flux:button
            variant="danger"
            type="submit"
            class="w-full">

            Logout

        </flux:button>

    </form>

</flux:sidebar>