import { useAuth0 } from '@auth0/auth0-react';
import { Home } from '../pages/Home';
import { LoginPage } from '../pages/Login';

export const LoginRoute = () => {
    const { isAuthenticated } = useAuth0();
    const Screen = Home;
    if (isAuthenticated) {
        Screen = LoginPage;
    }
    return ( Screen );
};