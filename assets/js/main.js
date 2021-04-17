const MPC_FT_Todo = require( './modules/mpc-ft-todo' );

// Init
( () => {
    let mpc_ft_todo = document.querySelectorAll( '.mpc-ft-todo' );

    for ( let todo of mpc_ft_todo ) {
        new MPC_FT_Todo( todo );
    }
} )();