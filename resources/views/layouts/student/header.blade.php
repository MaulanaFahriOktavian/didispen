<flux:header class="border-b bg-white dark:bg-zinc-900">

    <flux:sidebar.toggle
        class="lg:hidden"
        icon="bars-2"/>

    <flux:spacer/>

    <div class="flex items-center gap-3">

        <flux:avatar
            :name="auth('student')->user()->name"/>

        <div>

            <div class="font-semibold">

                {{ auth('student')->user()->name }}

            </div>

            <div class="text-xs text-zinc-500">

                {{ auth('student')->user()->nis }}

            </div>

        </div>

    </div>

</flux:header>