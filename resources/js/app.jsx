import './bootstrap';
import '../css/app.css';

import React from 'react';
import ReactDOM from 'react-dom/client';
import Welcome from './pages/Welcome';
import Home from './pages/Home';
import AllQuotes from './pages/quotes/AllQuotes';
import MyQuotes from './pages/quotes/MyQuotes';
import SourceQuotes from './pages/quotes/SourceQuotes';
import UserQuotes from './pages/quotes/UserQuotes';

const pages = {
    'welcome': <Welcome />,
    'home': <Home />,
    'all-quotes': <AllQuotes />,
    'my-quotes': <MyQuotes />,
    'source-quotes': <SourceQuotes />,
    'user-quotes': <UserQuotes />,
};

Object.keys(pages).forEach((id) => {
    const element = document.getElementById(id);
    if (!element) {
        return;
    }

    const props = Object.assign({}, element.dataset);
    const render = Object.keys(props).length ? React.cloneElement(pages[id], props) : pages[id];

    ReactDOM.createRoot(element).render(render);
});
