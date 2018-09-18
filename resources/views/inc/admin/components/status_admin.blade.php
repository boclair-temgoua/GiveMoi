                @hasrole('super-admin')
                <div class="submit text-center">
                    <button class="btn btn-rose btn-raised btn-warning">
                        <i class="material-icons">supervisor_account</i>
                        <b>Super Admin</b>
                    </button>
                </div>
                @endhasrole
                @hasrole('admin')
                <div class="submit text-center">
                    <button class="btn btn-rose btn-raised btn-warning">
                        <i class="material-icons">supervisor_account</i>
                        <b>Admin</b>
                    </button>
                </div>
                @endhasrole
                @hasrole('editor')
                <div class="submit text-center">
                    <button class="btn btn-success btn-raised">
                        <i class="material-icons">supervisor_account</i>
                        <b>Editor</b>
                    </button>
                </div>
                @endhasrole
                @hasrole('moderator')
                <div class="submit text-center">
                    <button class="btn btn-info btn-raised">
                        <i class="material-icons">supervisor_account</i>
                        <b>Moderator</b>
                    </button>
                </div>
                @endhasrole
                @hasrole('advertiser')
                <div class="submit text-center">
                    <button class="btn btn-primary btn-raised">
                        <i class="material-icons">supervisor_account</i>
                        <b>Advertiser</b>
                    </button>
                </div>
                @endhasrole

