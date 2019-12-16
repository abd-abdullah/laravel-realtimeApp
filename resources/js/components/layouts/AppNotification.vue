<template>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
        <ul class="nav nav-pills mr-auto justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i v-bind:style="{ color: bell_color}" class="fa fa-bell"></i>{{unreadCount}}
                </a>
                <ul class="dropdown-menu">
                    <li class="head text-light bg-dark">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <span>Notifications {{unreadCount}}</span>
                                <a href="" class="float-right text-light">Mark all as read</a>
                            </div>
                        </div>
                    </li>
                    <li v-for="notif in unread" class="notification-box">
                        <div class="row">
                            <b-link :href="notif.data.path" @click="markAsRead(notif.id)" class="col-12 m-2">
                                <strong class="text-info">{{notif.data.replyBy}}</strong>
                                <div>
                                    {{notif.data.replyContent}}
                                </div>
                                <small class="text-secondary">{{notif.created_at}}</small>
                            </b-link>
                        </div>
                    </li>

                    <li class="footer bg-dark text-center">
                        <a href="" class="text-light">View All</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "AppNotification",
        data() {
            return {
                read: {},
                unread: {},
                readCount: 0,
                bell_color:(this.readCount > 0?'red':null),
                unreadCount: 0,
                sound: "http://soundbible.com/mp3/A-Tone-His_Self-1266414414.mp3"
            }
        },
        created() {
            if (User.loggedIn()) {
                this.getNotifications();
            }

            Echo.private('App.Model.User.' + User.userId())
                .notification((notification) => {
                    this.playSound();
                    this.getNotifications();
                });
        },
        methods: {
            playSound(){
                let alert = new Audio(this.sound);
                alert.play();
            },

            getNotifications() {
                axios.get('/api/notifications')
                    .then(res => {
                        this.read = res.data.read;
                        this.unread = res.data.unread;
                        this.readCount = res.data.read.length;
                        this.unreadCount = res.data.unread.length;
                        this.bell_color = (this.readCount > 0?'red':null);
                    }).catch(error => Exception.handle.error);
            },
            markAsRead(id){
                axios.post('/api/notification/markAsRead',{id:id})
            }
        }
    }
</script>

<style scoped>
    body {
        margin-top: 50px;
        background-color: #f1f1f1;
    }

    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        background-color: #17A2B8;
    }

    .dropdown-menu {
        top: 60px;
        right: 0px;
        left: unset;
        width: 300px;
        box-shadow: 0px 5px 7px -1px #c1c1c1;
        padding-bottom: 0px;
        padding: 0px;
    }

    .dropdown-menu:before {
        content: "";
        position: absolute;
        top: -20px;
        right: 12px;
        border: 10px solid #343A40;
        border-color: transparent transparent #343A40 transparent;
    }

    .head {
        padding: 5px 15px;
        border-radius: 3px 3px 0px 0px;
    }

    .footer {
        padding: 5px 15px;
        border-radius: 0px 0px 3px 3px;
    }

    .notification-box {
        padding: 10px 0px;
    }

    .bg-gray {
        background-color: #eee;
    }

</style>