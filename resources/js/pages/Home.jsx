import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';

export default function Home({ name, email }) {
    return (
        <div>
            <div className="bg-custom-primary-2 shadow p-4 mb-4">
                <h1 className="font-bold">Welcome, {name}!</h1>
                <p>Email: {email}</p>
            </div>
            <div className="grid grid-cols-2">
                <RandomQuoteContainer source="forismatic" save />
                <RandomQuoteContainer source="quoterism" save />
                <RandomQuoteContainer source="zen" save />
                <RandomQuoteContainer source="programming" save />
            </div>
        </div>
    );
}
