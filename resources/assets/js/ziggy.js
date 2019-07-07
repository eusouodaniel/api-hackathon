    var Ziggy = {
        namedRoutes: {"backend.users.change-password":{"uri":"administrativo\/usuarios\/alterar-senha","methods":["POST"],"domain":null}},
        baseUrl: 'http://hackathon.local/',
        baseProtocol: 'http',
        baseDomain: 'hackathon.local',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
