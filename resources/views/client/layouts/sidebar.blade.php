<style>
      aside .sidebar {
                        display: flex;
                        flex-direction: column;
                        background-color: var(--color-white);
                        box-shadow: var(--box-shadow);
                        border-radius: 15px;
                        position: relative;
                        top: 1.5rem;
                        transition: all 0.3s ease;
                    }

                    aside .sidebar:hover {
                        box-shadow: none;
                    }

                    aside .sidebar a {
                        display: flex;
                        align-items: center;
                        color: var(--color-info-dark);
                        height: 3.7rem;
                        gap: 1rem;
                        position: relative;
                        margin-left: 2rem;
                        transition: all 0.3s ease;
                    }

                    aside .sidebar a span {
                        font-size: 2rem;
                        transition: all 0.3s ease;
                    }

                    aside .sidebar a h3{
                       display: none;
                    }

                    aside .sidebar a:last-child {
                        bottom: 2rem;
                        width: 100%;
                        position: absolute;
                    }

                    aside .sidebar a:active {
                        width: 100%;
                        color: var(--color-danger);
                        background-color: var(--color-light);
                        margin-left: 0;
                    }

                    aside .sidebar a:active::before {
                        content: '';
                        width: 6px;
                        height: 18px;
                        background-color: var(--color-danger);
                        align-items: center;
                    }

                    aside .sidebar a:active span {
                        background-color: var(--color-light);
                        margin-left: calc(1rem - 3px);
                    }

                    aside .sidebar a:hover {
                        color: rgb(225, 66, 66);
                    }

                    aside .sidebar a:hover span {
                        margin-left: 0.6rem;
                    }

                    aside .sidebar .message-count {
                        background-color: var(--color-danger);
                        padding: 2px 6px;
                        font-size: 10px;
                        color: #FFF;
                        border-radius: var(--border-radius-1);
                    }
</style>
<!-- sidebar -->

