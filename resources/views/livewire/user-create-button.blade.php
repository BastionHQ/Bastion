<div>
    <details class="details-reset details-overlay details-overlay-dark">
        <summary class="btn btn-primary my-3" aria-haspopup="dialog">Добавить пользователя</summary>
        <details-dialog
            class="Box Box--overlay d-flex flex-justify-start flex-column anim-fade-in fast">
            <div class="Box-header">
                <button class="Box-btn-octicon btn-octicon float-right" type="button"
                        data-close-dialog>
                    <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12"
                         height="16" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
                    </svg>
                </button>
                <h3 class="Box-title">Добавление пользователя</h3>
            </div>
            <div class="Box-body text-left">
                <livewire:user-create-form/>
            </div>
        </details-dialog>
    </details>
</div>
