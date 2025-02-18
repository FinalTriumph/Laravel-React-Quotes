import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';
import SectionTitle from '../components/SectionTitle.jsx';

export default function Home() {
    return (
        <div className="text-left">
            <SectionTitle title="Random Quotes" />
            <div className="grid grid-cols-2">
                <RandomQuoteContainer source="forismatic" save />
                <RandomQuoteContainer source="quoterism" save />
                <RandomQuoteContainer source="zen" save />
                <RandomQuoteContainer source="programming" save />
            </div>
        </div>
    );
}
