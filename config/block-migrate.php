<?php

// config for LuongoLabs/BlockMigrate
return [

    /*
     * In these directories block migrations will be stored and ran when migrating. A block
     * migration created via the make:block-migration command will be stored in the first path or
     * a custom defined path when running the command.
     */
    'migrations_paths' => [
        database_path('blocks'),
    ],

];
