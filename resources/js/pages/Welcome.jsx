import React from 'react';
import NewQuote from '../components/NewQuote.jsx';
import Quotes from '../components/Quotes.jsx';

export default function Welcome() {
    return (
        <div>
            <NewQuote />
            <Quotes />
        </div>
    );
}
